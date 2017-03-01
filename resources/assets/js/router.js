import VueRouter    from 'vue-router'

//Define route components
const Home = { template: '<div>home</div>' }
const Foo = { template: '<div>Foo</div>' }
const Bar = { template: '<div>Bar</div>' }

// lazy load components
const List = (resolve) => require(['./components/List.vue'], resolve)
const Grid = (resolve) => require(['./components/Grid.vue'], resolve)

export default new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        { path: '/', component: Grid },
        { path: '/grid', component: Grid },
        { path: '/list', component: List }
    ]
});