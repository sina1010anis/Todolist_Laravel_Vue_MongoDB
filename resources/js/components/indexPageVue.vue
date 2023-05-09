<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="my-font-IYM my-color-b-600 my-3">
                    لیست کار های روزمره
                </h2>
                <p class="my-font-IYL my-f-13 mb-0 pb-0 select-none" dir="rtl"><i class="bi bi-arrow-bar-left my-f-22 my-color-b-600 my-pos-rel ms-2" style="top:4px"></i>با دکمه <span style="color:rgb(0, 142, 0)">"ثبت"</span> یا کلید <span style="color:rgb(0, 142, 0)">"Enter"</span> میتواند یک تسک جدید وارد کنید.</p>
                <p class="my-font-IYL my-f-13 mb-0 pb-0 select-none" dir="rtl"><i class="bi bi-arrow-bar-left my-f-22 my-color-b-600 my-pos-rel ms-2" style="top:4px"></i>با علامت <span style="color:rgb(73, 73, 255)">"<i class="bi bi-chevron-down"></i>"</span> میتواند زیر مجوعه های تسک خود راببیند و حذف یا اضافه کنید</p>
                <p class="my-font-IYL my-f-13 mb-0 pb-0 select-none" dir="rtl"><i class="bi bi-arrow-bar-left my-f-22 my-color-b-600 my-pos-rel ms-2" style="top:4px"></i> با کلیک روی زیر تسک ها میتواند ان ها را از لیست زیر تسک ها حذف کنید</p>
                <p class="my-font-IYL my-f-13 mt-0 pt-0 select-none" dir="rtl"><i class="bi bi-arrow-bar-left my-f-22 my-color-b-600 my-pos-rel ms-2" style="top:4px"></i>با علامت <span style="color:rgb(255, 76, 76)">"X"</span> میتواند تسک مورد نظر را حذف کند.</p>
                <div class="input-group mb-3 mt-5 my-w-75-i">
                    <button @click="new_task" class="btn btn-outline-secondary my-font-IYL my-f-18-i px-4" type="button" id="button-addon1">ثبت</button>
                    <input @keyup.enter="new_task" v-model="text" dir="rtl" type="text" class="form-control my-f-12-i border-1 border-secondary my-w-50 my-font-IYM" placeholder="یک تسک جدید وارد کنید...!" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
                <div class="my-w-75">
                    <button class="btn btn-danger btn-sm float-end" @click="delete_task('all')">حذف همه تسک ها</button>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="task" v-if="tasks_data == null" v-for="(task , index) in tasks" @key="index">
                    <div class="p-2 mt-3 rounded-1 my-w-75 d-flex justify-content-between align-items-center my-pos-rel overflow-hidden category-task" style="border: 1px solid rgb(84, 84, 84);" >
                        <p class="my-font-IYM my-f-13 my-pointer" @click="delete_task('task' , task._id)">{{ task.title }}</p>
                        <i class="bi bi-chevron-down my-f-18 my-pointer icon-open-task" @click="show_sub_task(task._id)"></i>
                    </div>
                    <div class=" mt-1 rounded-1 my-w-75 list-sub-task" :id="task._id" style="border: 1px solid rgb(84, 84, 84);">
                        <ul>
                            <li v-for="(sub_task , index) in data_sub_task" @key="index" class="my-f-12 py-2 my-pointer my-color-b-700 my-font-IYL">
                                <p @click="delete_task('sub_task' ,task._id , sub_task._id)">{{ sub_task.title }}</p>
                            </li>
                        </ul>
                        <div  class="input-group mb-3 mt-5 my-w-75-i">
                            <button  @click="new_sub_task(task._id)" class="btn btn-outline-secondary my-font-IYL my-f-14-i px-4" type="button" id="button-addon1">ثبت</button>
                            <input v-model="text_sub" @keyup.enter="new_sub_task(task._id)" dir="rtl" type="text" class="form-control my-f-12-i border-1 border-secondary my-w-50 my-font-IYM" placeholder="اضافه کردن زیر تسک جدید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-danger btn-sm float-end" @click="delete_task('all_sub_task', task._id)">حذف همه زیر تسک ها</button>
                        </div>
                    </div>
                </div>
                <div class="task" v-else v-for="(task , index) in tasks_data" @key="index">
                    <div class="p-2 mt-3 rounded-1 my-w-75 d-flex justify-content-between align-items-center my-pos-rel overflow-hidden category-task" style="border: 1px solid rgb(84, 84, 84);" >
                        <p class="my-font-IYM my-f-13 my-pointer" @click="delete_task('task' , task._id)">{{ task.title }}</p>
                        <i class="bi bi-chevron-down my-f-18 my-pointer icon-open-task" @click="show_sub_task(task._id)"></i>
                    </div>
                    <div class=" mt-1 rounded-1 my-w-75 list-sub-task" :id="task._id" style="border: 1px solid rgb(84, 84, 84);">
                        <ul>
                            <li v-for="(sub_task , index) in data_sub_task" @key="index" class="my-f-12 py-2 my-pointer my-color-b-700 my-font-IYL">
                                <p @click="delete_task('sub_task' , task._id , sub_task._id)">{{ sub_task.title}}</p>
                            </li>
                        </ul>
                        <div  class="input-group mb-3 mt-5 my-w-75-i">
                            <button  @click="new_sub_task(task._id)" class="btn btn-outline-secondary my-font-IYL my-f-14-i px-4" type="button" id="button-addon1">ثبت</button>
                            <input v-model="text_sub" @keyup.enter="new_sub_task(task._id)" dir="rtl" type="text" class="form-control my-f-12-i border-1 border-secondary my-w-50 my-font-IYM" placeholder="اضافه کردن زیر تسک جدید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-danger btn-sm float-end" @click="delete_task('all_sub_task' , task._id )">حذف همه زیر تسک ها</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div dir="rtl" class="message-ok-for-server message-for-server my-w-50 p-3 my-font-IYM my-f-12">
        {{ text_message }}
    </div>
    <div dir="rtl" class="message-error-for-server message-for-server my-w-50 p-3 my-font-IYM my-f-12">
        {{ text_message }}
    </div>
</template>

<script>
import $ from "jquery";
import axios from 'axios';
export default {

    name:'indexPageVue',
    data:()=>({
        text:null,
        text_sub:null,
        tasks_data:null,
        data_sub_task:null,
        text_message:null,
    }),mounted(){

    },methods:{
        delete_task(mode , id_task = null , id_sub = null){
            axios.post('delete/task/'+mode , {id:id_task , id_sub:id_sub}).then((res)=>{
                    this.show_message_server(' عملیات حذف با موفقیت انجام شد' , 'message-error-for-server' );
                    axios.post('get/tasks').then((resp)=>{
                        this.text = null
                        this.tasks_data = resp.data
                    })
                })
        },
        show_message_server(text = 'تسک جدید وارد شد.' , class_css = 'message-ok-for-server' , time_out = 3500 , pos = {bottom:'5px'} , pos_back = {bottom:'-100px'}){
            this.text_message = text
            $('.'+class_css).animate(pos);
            setTimeout(()=>{
                $('.'+class_css).animate(pos_back);
            },time_out)
        },
        new_sub_task(id){
            axios.post('new/sub/tasks' , {id:id , title:this.text_sub}).then((res)=>{
                    this.show_message_server('زیر تسک جدید وارد شد' );
                    this.text_sub = null
                    this.data_sub_task = res.data
                })
        },
        show_sub_task(id){
            axios.post('get/sub/tasks' , {id:id}).then((res)=>{
                    this.data_sub_task = res.data
                    $('.list-sub-task').stop().slideUp()
                    $('#'+id).stop().slideToggle()
                    this.text_sub=null
                }).catch(()=>{
                    this.show_message_server('خطایی رخ داده' , 'message-error-for-server');
            })
        },
        new_task()
        {
            axios.post('new/task' , {title:this.text}).then((res)=>{
                this.show_message_server(' تسک جدید وارد شد');
                axios.post('get/tasks').then((resp)=>{
                    this.text = null
                    this.tasks_data = resp.data
                })
            }).catch(()=>{
                this.show_message_server('خطایی رخ داده' , 'message-error-for-server');
            })
        }
    },
    props:{
        tasks:Object,
    }

}
</script>
