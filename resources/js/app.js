import './bootstrap';
import $ from "jquery";
import {createApp} from 'vue'
import indexPageVue from './components/indexPageVue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
const app = createApp({
    data:()=>({
        versionVue:3
    }),
    components:{
        indexPageVue
    },
    mounted(){
    }

})

app.mount('#app')
