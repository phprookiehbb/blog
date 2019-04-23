$(function () {
    $.ajaxSetup({headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}});
    layui.use(["layer"], function () {
        layer = layui.layer
    });
    $(".ajaxForm").ajaxForm({dataType: "json", success: b});
    $(".ajaxForm2").ajaxForm({dataType: "json", success: a});

    function b(c) {
        if (c.code == 1) {
            layer.msg(c.msg, {time: 2000, icon: 6}, function () {
                if (c.url) {
                    window.location.href = c.url
                }
            })
        } else {
            layer.msg(c.msg, {time: 2000, icon: 5})
        }
    }

    function a(c) {
        if (c.code == 1) {
            layer.msg(c.msg, {time: 2000, icon: 6}, function () {
                window.location.href = c.url
            })
        } else {
            layer.msg(c.msg, {time: 2000, icon: 5})
        }
    }
    $('.comment-check').click(function(){
        var type = $(this).data('type');
        var url = $(this).data('href');
        var id = $(this).data('id');
        layer.confirm('审核通过么？', {
            btn: ['通过','不通过'] //按钮
        }, function(){
            $.post(url,{type:type,id:id,status:1},function(data){
                if(data.code == 1){
                    layer.msg('审核成功', {time: 2000, icon: 6}, function () {
                        window.location.reload();
                    })
                }else{
                    layer.msg('操作失败', {time: 2000, icon: 5})
                }
            },'json')
        }, function(){
            $.post(url,{type:type,id:id,status:0},function(data){
                if(data.code == 1){
                    layer.msg('审核成功', {time: 2000, icon: 6}, function () {
                        window.location.reload();
                    })
                }else{
                    layer.msg('操作失败', {time: 2000, icon: 5})
                }
            },'json')
        });

    })
});