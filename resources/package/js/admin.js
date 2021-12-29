import axios from "axios";

$(function(){
    $("#game-init").click(function(){
        axios.post("/admin/game/init",{
            _token:csrf_token
        }).then(r=>{
            var data = r.data;
            if(data.success===false){
                swal({
                    title:"Error",
                    icon: "error",
                    text:data.result.msg
                })
            }else{
                swal({
                    title:"Success",
                    icon: "success",
                    text:data.result.msg
                })
            }
        }).catch(e=>{
            console.error(e)
            alert("请求出错,详细查看控制台")
        })
    })
})