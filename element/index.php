

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>树控件测试</title>
    <!-- 引入样式 -->
    <script src="//unpkg.com/vue/dist/vue.js"></script>
    <!-- 引入样式 -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- 引入组件库 -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
</head>
<body>


<div id="treeView">
    <el-tree
        :data="data2"
        :props="defaultProps"
        node-key="id"
        :expand-on-click-node="false"
        :render-content="renderContent">
    </el-tree>
</div>


<script type="text/javascript">

    var treeView = new Vue({
        el: '#treeView',
        data: {
            data2: [{
                id: 1,
                label: '一级 1',
                children: [{
                    id: 4,
                    label: '二级 1-1',
                    children: [{
                        id: 9,
                        label: '三级 1-1-1'
                    }, {
                        id: 10,
                        label: '三级 1-1-2'
                    }]
                }]
            }, {
                id: 2,
                label: '一级 2',
                children: [{
                    id: 5,
                    label: '二级 2-1'
                }, {
                    id: 6,
                    label: '二级 2-2'
                }]
            }, {
                id: 3,
                label: '一级 3',
                children: [{
                    id: 7,
                    label: '二级 3-1'
                }, {
                    id: 8,
                    label: '二级 3-2'
                }]
            }],
            defaultProps: {
                children: 'children',
                label: 'label'
            }
        },
        methods:{
            renderContent:function(createElement, { node }) {
                var self = this;
                return createElement('span', [
                    createElement('span', node.label),
                    createElement('span', {attrs:{
                        style:"float: right; margin-right: 20px"
                    }}),
                ]);
            }
        }
    })
</script>

</body>
</html>
