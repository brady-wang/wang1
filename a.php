<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div id="test">
    <li-component v-for="(item,index) in list" :title="item" v-bind:key="index" :id="index" v-on:btn="pclick"></li-component>
</div>


<script>
    Vue.component("li-component",{
        props:['title','id'], //接收到的父组件的值
        data:function(){
            return {
                count:0,
            }
        },
        template:"<li v-on:click='child'>{{ title }}</li>", //子组件点击触发本组件的child方法
        methods:{
            child:function(){
                this.$emit('btn',this.id) //btn为父组件定义的自定义事件   v-on:btn="pclick"
            }
        }
    })

    var vue = new Vue({
        el:"#test",
        data:{
            list:[
                    'a','b','c','e','f','g','h'
            ]
        },
        methods:{
            'pclick':function(id){
                this.list.splice(id,1) //删除指定的下表元素
            }
        }
    })




</script>