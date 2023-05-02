import './bootstrap';
import {createApp} from 'vue'
import indexPageVue from './components/indexPageVue'
const app = createApp({
    data:()=>({
        versionVue:3
    }),
    components:{
        indexPageVue
    },

})

app.mount('#app')
