<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
/* 公共样式 */
        *{
            margin: 0;
            padding: 0;
        }
        ul,li{
            list-style: none;
        }
        html{
            width:100%;
            height:100%;
            margin:0px auto;
        }
        body{
            width:80%;
            height:95%;
            margin:0px auto;
            position:relative;
            
        }
        .box{
            position:absolute;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            width: 100%;
            /* height:100%; */
            border:1px solid #666;
            /* margin:0px auto; */
        }
        h2{
            text-align: center;
            margin:0px auto;
            height:6%;
            overflow:hidden;
        }
        
        .content{
            width: 100%;
            height: 84%;
            border-top:1px solid #666;
            border-bottom:1px solid #666;
            position:relative;
        }
        a{
            text-decoration:none;
        }

/* 接收到的消息 */
        .link_msg{
            position:absolute;
            top:5px;
            left:25px;
        }
        .link_msg .link_select{
            height: 25px;
            overflow: hidden;
            background-color: #b1d47d;
            cursor: pointer;
        }
        .link_msg option{
            height: 25px;
            padding:2px 0px;
            border:2px solid #ccc;
            background-color: #c3e8f7 ;
            overflow: hidden;
        }  
        .link_msg span{
            height:10px;
            font-size:10px;
            padding:2px;
            background-color:red;
            border-radius:5px;
            color:#fff;
        }   
/* 所有在线联系人 */
        .link_all{
            position:absolute;
            top:0px;
            left:0px;
            width: 20%;
            height: 100%;
            text-align: center;
            overflow:auto;

        }
        .link_all .link_people h3{
            margin:20px 0px;
            color:green;
        }
        .link_all .link_people li{
            margin-bottom:10px;
        }
        .link_all .link_people li span{
            overflow:hidden;
        }
        .link_all .link_people li a{
            color:yellowgreen;
        }

        

/* 群聊内容 */
        .msg{
            position:absolute;
            top:0px;
            left:20%;
            width: 55%;
            height: 100%;
            border-left:1px solid #666;
            border-right:1px solid #666;
            padding:0px 20px;
            position: relative;
            overflow-y:auto;
            overflow-x:hidden;
            
        }
        .msg .msg_box{
            width: 100%;
            display: inline-block;            
        }
        .msg ul{
            width:100%;
            min-height:45px;      
            margin:10px 0px;  
            border:1px solid #fff; 
        }
        .msg ul li{
            clear:both;
            margin-bottom:20px;
        }
        .msg li h4{
            display:inline-block;
            margin-right:10px;
        }
        .msg li span{
            display:inline-block;
            max-width:70%;
            padding:10px;
            border:1px solid #ccc;
            background-color:#c3e8f7;
            border-radius:15px;
            
        }
        .msg li span i{
            font-size:12px;
            color:#999;
        }
        .msg li span pre{
            width:100%;
            font-size:16px;
            font-family:KaiTi;
            font-weight:bold;
            line-height:1.5rem;
            white-space: pre-wrap; /*css-3*/ 
            white-space: -moz-pre-wrap; /*Mozilla,since1999*/ 
            white-space: -pre-wrap; /*Opera4-6*/ 
            white-space: -o-pre-wrap; /*Opera7*/ 
            word-wrap: break-word; /*InternetExplorer5.5+*/
        }
        
        .msg .left,.msg .left h4{
            float:left;
        }
        
        .msg .right,.msg .right h4,.msg .right span{
            float:right;
        }
        .msg .right h4{
            margin-left:10px;
        }
/* 房间在线联系人 */
        .link_room{
            position:absolute;
            top:0px;
            right:0px;
            height: 95%;
            width: 20%;
            padding-top: 20px;
            overflow:auto;
        }
        .link_room h3{
            text-align: center;
            margin-bottom:20px;
            color:green;
        }
        .link_room .room{
            width:100%;
        }
        
        .link_room .group{
            width: 70%;
            overflow: hidden;
            margin:0px auto;
            top: 0;
            background-color: #ccc;
            border: 1px solid #999;
            margin-bottom: 10px;
        }
        .link_room .group li{
            cursor: pointer;
            height: 22px;
            border:2px solid #ccc;
            background-color: #87eb8e ;
            padding:2px 0px;
        }
        .link_room .group li:first-child{
            padding: 0;
            background-color:#b1d47d;
            overflow:hidden;
        }
        .link_room .group .join{
            width:100%;
            padding:2px;
        }
        
        .link_room .group li a{
            float:right;
            color:blue;
            font-size:14px;
        }
        .group_height{
            height: 22px;
        }
        
/* 底部发送信息 */
        .bottom{
            width: 100%;
            height:10%;
        }
        .bottom div{
            width: 50%;
            height:100%;
            margin:10px auto;
            position:relative;
        }
        .bottom textarea{
            position:absolute;
            top:0px;
            left:0px;
            width: 70%;
            height:60%;
            resize:vertical;
        }
        .bottom button{
            position:absolute;
            top:0px;
            left:75%;
            width:25%;
            height:60%;
            padding:2px 10px;
            background-color:yellowgreen;
            cursor:pointer;
            border-radius:15px;
            outline:none;
            overflow:hidden;
        }
        
    </style>
</head>
<body>
<div id="vue">
    <div class="box">
        <div class="link_msg"  v-if="link_user.length>0">
            <select class="link_select" @change.prevent="link_one(link_k)" v-model="link_k">
                <option value="">等待回复的消息</option>
                <option v-for="(v,k) in link_user" :value="k">{{v.user_name}}</option>
            </select>
            <span>有新消息</span>
        </div>
        <h2>
            <span style="color:yellowgreen;" v-if="chat_type=='all'">【广场群聊】</span>
            <span style="color:yellowgreen;" v-if="chat_type=='room'">【{{room_name}}】</span>
            <span style="color:yellowgreen;" v-if="chat_type=='one'">【{{one_name}}】</span>

            <span v-if="chat_type!='all'"><a href="javascript:;" @click.prevent="join_all" style="color:skyblue;">点击进入广场聊天</a></span>
            <span><a href="/" style="color:red;">退出聊天室</a></span>
        </h2>

        <div class="content">
        <!-- 在线联系人s -->
            <div class="link_all">
                <ul class="link_people">
                    <h3>其它在线联系人</h3>
                    <li v-for="(v,k) in users" v-if="v!=user_name">
                        <span >{{v}} </span>
                        <a href="javascript:;" @click.prevent="join_one(k,v)" :title="v">点击私聊</a>
                    </li>
                </ul>
            </div>
        <!-- 在线联系人e -->

        <!-- 聊天内容s -->
            
            <!-- 广场聊天内容 -->
            <div class="msg" v-if="chat_type=='all'">
                <div class="msg_box">
                    <ul v-for="(v,k) in all_msg">
                        <li class="left" v-if="v.user_name!=user_name">
                            <h4>{{v.user_name}} :</h4>
                            <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                        </li>
                        <li class="right" v-if="v.user_name==user_name">
                            <h4>: {{v.user_name}}</h4>
                            <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 房间聊天内容 -->
            <div class="msg" v-if="chat_type=='room'">
                <div class="msg_box">
                <ul v-for="(v,k) in room_msg">
                    <li class="left" v-if="v.user_name!=user_name">
                        <h4>{{v.user_name}} :</h4>
                        <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                    </li>
                    <li class="right" v-if="v.user_name==user_name">
                        <h4>: {{v.user_name}}</h4>
                        <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                    </li>
                </ul>
                </div>
            </div>

            <!-- 私聊内容 -->
            <div class="msg" v-if="chat_type=='one'">
                <div class="msg_box">
                <ul v-for="(v,k) in one_msg">
                    <li class="left" v-if="v.user_name!=user_name">
                        <h4>{{v.user_name}} :</h4>
                        <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                    </li>
                    <li class="right" v-if="v.user_name==user_name">
                        <h4>: {{v.user_name}}</h4>
                        <span><i>{{v.created_at}}</i><pre>{{v.content}}</pre></span>
                    </li>
                </ul>
                </div>
            </div>
        <!-- 聊天内容e -->
        
        <!-- 房间信息s -->
            <div class="link_room">
                <h3>房间群聊</h3>
                <div ref="abc" class="room">
                    <ul class="group group_height" v-for="(v,k) in rooms"> 
                        <li onclick="app.update_select(this)" :title="v.room_name" onselectstart="return false;">
                            <span>▼</span>{{v.room_name}} 
                        </li>
                        <li class="join"  v-if="v.room_name!=room_name">
                            <button>
                                <a href="javascript:;" @click.prevent="join_room(k,v.room_name)" style="color:green">点击进入房间</a>
                            </button>
                        </li>
                        <li v-for="(v1,k1) in v.room_users">
                            <span :title="v1" >{{v1}}</span> 
                            <a href="javascript:;" @click.prevent="join_one(k1,v1)" v-if="v1!=user_name" :title="v1">点击私聊</a>
                        </li>
                    </ul>
                </div>
            </div>
        <!-- 房间信息e -->
        </div>
        <div class="bottom">
            <div>
                <textarea cols="30" rows="10" v-model="content"></textarea>
                <button type="button" @click.prevent="submit">点击发送<br>( Ctrl+Enter )</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/vue.min.js"></script>

<?php
    require('./vendor/autoload.php');
    use Firebase\JWT\JWT;
    
    //判断cookie中是否有jwt_token,说明是否登录
    if(isset($_COOKIE['jwt_token'])){

        $key='abcd';
        $jwt_token=$_COOKIE['jwt_token'];
        $token = JWT::decode($_COOKIE['jwt_token'], $key, array('HS256'));

        //取出cookie中jwt_token中的用户名，用于保存当前登录的用户名
        $user_name=$token->user_name;

    }else{
        $jwt_token='';
    }
?>

<script>
    //判断是否按ctrl+Enter键调教文字
    document.onkeydown = function(e){
        if(e.keyCode == 13&&e.ctrlKey==true){
            app.submit();
        }
    }
    var app = new Vue({
        el:'#vue',
        data:{
            ws:null,                //保存workerman客户端对象
            
            user_name:'',           //保存自己的用户名
            rooms:[],               //保存所有的房间
            users:[],               //保存所有在线用户

            link_user:[],           //保存给我发了消息，但我并未与他对话的用户
            link_k:'',            //保存给我发了消息，我选择回复的用户索引

            chat_type:'all',        //保存当前聊天的模式  all:广场群聊   room:房间群聊  one:私聊
            content:'',             //保存即将发送的消息

            all_msg:[],             //广场群聊模式时,保存群聊信息

            room_id:null,           //房间群聊模式时,保存当前进入的房间id
            room_name:null,         //房间群聊模式时,保存当前进入的房间name
            room_msg:[],            //房间群聊模式时,保存房间聊天信息

            one_id:null,            //私聊模式时，保存当前私聊对象id
            one_name:null,          //私聊模式时，保存当前私聊对象name
            one_msg:[],             //私聊模式时，保存私人聊天信息
        },
        created:function(){

            let jwt_token="<?=$jwt_token?>";    
            
            if(jwt_token!=''){  //判断是否登录,登录后初始化数据
                this.user_name="<?=$user_name?>";

                //因为是跨域访问，开启的workerman服务器无法得到cookie所以我们需要把保存有用户信息的jwt_token传递过去
                this.ws=new WebSocket("ws://127.0.0.1:8124?token="+jwt_token); 

                //给workerman客户端添加方法
                this.ws.onopen=this.onopen;
                this.ws.onmessage=this.onmessage;
                this.ws.onclose=this.onclose;
                
            }else{
                alert('请先登录!');
                location.href="login.php";
            }

        },
        updated:function(){
            this.user_name="<?=$user_name?>";

            //信息添加时自动向上移动效果
            let msg_box_height=$('.msg_box').height();
            $('.msg').scrollTop(msg_box_height);
            
        },
        methods:{
            update_select:function(a){
                //房间列表下拉效果
                $(a).parent().toggleClass('group_height');
            },
            onopen:function(){
                //进入聊天室时触发
                
                alert('  欢迎来到《金光吐槽》聊天室 ');
            },
            onmessage:function(e){
                //客户端接收服务器端推送是触发
                
                let data=JSON.parse(e.data);

                //判断当前在聊天室中的状态，执行相应的操作
                switch(data.type){
                    case 'update_status':
                        //有人进入聊天室时，更新数据
                        this.users=data.users;
                        this.rooms=data.rooms;
                        if(this.user_name==data.user_name){
                            this.all_msg=data.all_msg;
                        }
                        this.all_msg=data.all_msg;
                        break;
                    case 'close':
                        //离开聊天室时，更新数据
                        this.users=data.users;
                        this.rooms=data.rooms;
                        break;
                    case 'join_all':
                        //点击进入广场时
                        this.rooms=data.rooms;

                        if(this.user_name==data.user_name){
                            this.room_msg=data.room_msg;
                        }                        
                        break;
                    case 'sub_all':
                        //在广场发消息
                        this.all_msg.push({
                            'user_name':data.user_name,
                            'content':data.content
                        });
                        break;
                    case 'join_room':
                        //进入某个房间
                        this.rooms=data.rooms;
                        if(this.user_name==data.user_name){
                            this.room_msg=data.room_msg;
                        }
                        break;
                    case 'sub_room':
                        //在房间发消息
                        this.room_msg.push({
                            'user_name':data.user_name,
                            'content':data.content
                        });
                        break;
                    case 'join_one':
                        //进入私聊模式
                        this.one_msg=data.one_msg;
                        break;
                    case 'sub_one':
                        console.log(this.user_id,data.user_id);
                        
                        //私聊发消息
                        if(this.one_name==data.user_name||this.user_name==data.user_name){
                            this.one_msg.push({
                                'user_name':data.user_name,
                                'content':data.content
                            });
                        }else{
                            let is_new=true;
                            for(let i=0;i<this.link_user.length;i++){
                                if(this.link_user[i].user_id==data.user_id){
                                    is_new=false;
                                    break;
                                }
                            }
                            if(is_new){
                                this.link_user.push({
                                    'user_id':data.user_id,
                                    'user_name':data.user_name
                                });
                            }
                        }
                        break;
                }

            },
            onclose:function(){
                //客户端关闭时触发
            },
            submit:function(){
                //发布消息时触发
                if(this.content.replace(/(^\s*)|(\s*$)/g,"")!=''){
                    let sub_obj=null;
                    let content=this.content.replace(/(^\s*)|(\s*$)/g,"");

                    if(this.chat_type=='all'){
                        sub_obj={chat_type:'all',content:content};
                    }else if(this.chat_type=="room"){
                        sub_obj={chat_type:'room',room_id:this.room_id,room_name:this.room_name,content:content};
                    }else if(this.chat_type=="one"){
                        sub_obj={chat_type:'one',one_id:this.one_id,one_name:this.one_name,content:content};
                    }
                    
                    this.content='';
                    this.ws.send(JSON.stringify(sub_obj));
                }
                
            },
            join_all:function(){
                //用户进入广场时触发
                this.chat_type='all';
                this.room_id=null;
                this.room_name=null;

                let sub_obj={chat_type:'join_all'};
                this.ws.send(JSON.stringify(sub_obj));
                
            },
            join_room:function(room_id,room_name){
                //用户进入房间时触发,对相关显示信息进行重置

                this.chat_type='room';
                this.room_id=room_id;
                this.room_name=room_name;

                let sub_obj={chat_type:'join_room',room_id:this.room_id,room_name:this.room_name};
                this.ws.send(JSON.stringify(sub_obj));

            },
            join_one:function(one_id,one_name){
                //用户进入私聊模式时触发,对相关显示信息进行重置

                this.chat_type='one';
                this.one_id=one_id;
                this.one_name=one_name;

                let sub_obj={chat_type:'join_one',one_id:this.one_id,one_name:this.one_name};
                this.ws.send(JSON.stringify(sub_obj));
            },
            link_one:function(k){
                //回复等待处理的信息时触发,对相关显示信息进行重置
                this.chat_type='one';
                this.one_id=this.link_user[k].user_id;
                this.one_name=this.link_user[k].user_name;
                this.link_user.splice(k,1);
                this.link_k='';
                let sub_obj={chat_type:'join_one',one_id:this.one_id,one_name:this.one_name};
                this.ws.send(JSON.stringify(sub_obj));
            }
        }
    })
</script>