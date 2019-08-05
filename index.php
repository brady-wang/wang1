<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div id="counter-event-example">
    <p>{{ total }}</p>
    <button-counter v-on:btn="test"></button-counter>
</div>

<script>
//    Vue.component('button-counter', {
//        template: '<button v-on:click="increment">{{ counter }}</button>',
//        data: function () {
//            return {
//                counter: 0
//            }
//        },
//        methods: {
//            increment: function () {
//                this.counter += 1
//                this.$emit('btn', this.counter);// 父组件自定义了btn时间
//            }
//        },
//    })
//    new Vue({ //父组件
//        el: '#counter-event-example',
//        data: {
//            total: '点击下面的按钮'
//        },
//        methods: {
//            test: function (b) {
//                this.total  = b;
//            }
//        }
//    })




</script>