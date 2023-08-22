<div id="app">
    <label for="fruits">选择水果：</label>
    <select id="fruits" v-model="selectedFruit1">
        <option value="apple">苹果</option>
        <option value="banana">香蕉</option>
        <option value="orange">橙子</option>
        <option value="grape">葡萄</option>
    </select>
    <selected2 :fruit="this.selectedFruit1"></selected2>
    <my-button @button-click="parentClicked"></my-button>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>

//props 用法    
Vue.component('selected2',{
    data:function(){
        return{
            selectedPrice:'',
        };
    },
    props:['fruit'],
    template:
        `<div>
            <p>你选择的水果是: @{{ fruit }}</p>
        </div>`
})

//emit 用法
Vue.component('my-button',{
  template: '<button @click="myClick">button</button>',
  methods:{
    myClick(){
        this.$emit("button-click",'hi')
    }
}
});

new Vue({ 
    el: '#app',
    data: function() {
        return {
            selectedFruit1: '', // 初始化选中值
        };
    },
    methods:{
      parentClicked(num){
        console.log(num);
      }
    }
})


</script>