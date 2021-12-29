import axios from "axios";
import iziToast from "izitoast";

if(document.getElementById("game-chishenme-index")){
    $(function () {
        axios.post("/games/chishenme/list",{
            _token:csrf_token
        }).then(r=>{
            var data = r.data;
            if(data.success===false){
                iziToast.error({
                    title: "Error",
                    message:"食谱加载失败!",
                    position:"topRight"
                })
            }else{
                iziToast.success({
                    title: "Success",
                    message:"食谱加载完毕!",
                    position:"topRight"
                })
                var run = 0,
                    heading = $("#chishenme-h1"),
                    timer;
                $("#chishenme-start").click(function () {
                    var list = data.result;
                    //console.log(list)
                    if (!run) {
                        heading.html(heading.html().replace("吃这个！", "吃什么？"));
                        $(this).val("停止");
                        timer = setInterval(function () {
                            var r = Math.ceil(Math.random() * list.length),
                                food = list[r - 1];
                            $("#chishenme-what").html(food);
                            var rTop = Math.ceil(Math.random() * $(document).height()),
                                rLeft = Math.ceil(Math.random() * ($(document).width() - 50)),
                                rSize = Math.ceil(Math.random() * (37 - 14) + 14);
                            $("<span class='temp'></span>").html(food).hide().css({
                                "top": rTop,
                                "left": rLeft,
                                "color": "rgba(0,0,0,." + Math.random() + ")",
                                "fontSize": rSize + "px"
                            }).appendTo("body").fadeIn("slow", function () {
                                $(this).fadeOut("slow", function () {
                                    $(this).remove();
                                });
                            });
                        }, 50);
                        run = 1;
                    } else {
                        heading.html(heading.html().replace("吃什么？", "吃这个！"));
                        $(this).val("不行，换一个");
                        clearInterval(timer);
                        run = 0;
                    };
                });

                document.onkeydown = function enter(e) {
                    var e = e || event;
                    if (e.keyCode == 13) $("#chishenme-start").trigger("click");
                };
            }
        }).catch(e=>{
            console.error(e)
            iziToast.error({
                title: "Error",
                message:"食谱加载失败! 请求出错 详细查看控制台",
                position:"topRight"
            })
        })
    });



    var i = 0;
    $('#chishenme-start').click(function(){
        i++;
        if(i >=20 ){
            $('#chishenme-start').hide();
            $('#chishenme-stop').show();
        }
    })
    $('#chishenme-stop').click(function(){
        swal({
            title:"你今天别吃了！按钮我收走了",
            closeOnClickOutside: false,
        })
        $(this).hide();
    })
}


if(document.getElementById("vue-chishenme-addFood")){
    const app = {
        data(){
            return {
                name:"糖醋里脊",
            }
        },
        methods:{
            submit(){
                if(!this.name){
                    alert("不能提交空内容")
                }
                axios.post("/games/chishenme/addFood",{
                    _token:csrf_token,
                    name:this.name,
                }).then(r=>{
                    var data = r.data;
                    if(data.success===true){
                        iziToast.success({
                            title: "Success",
                            message:data.result.msg,
                            position:"topRight"
                        })
                        this.name="";
                    }else{
                        iziToast.error({
                            title: "Error",
                            message:data.result.msg,
                            position:"topRight"
                        })
                    }
                }).catch(e=>{
                    iziToast.error({
                        title: "Error",
                        message:"请求出错,详细查看控制台",
                        position:"topRight"
                    })
                    console.error(e)
                })
            }
        }
    }
    Vue.createApp(app).mount("#vue-chishenme-addFood")
}