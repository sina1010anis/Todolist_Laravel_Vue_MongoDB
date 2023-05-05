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
                    <button class="btn btn-outline-secondary my-font-IYL my-f-18-i px-4" type="button" id="button-addon1">ثبت</button>
                    <input dir="rtl" type="text" class="form-control my-f-12-i border-1 border-secondary my-w-50 my-font-IYM" placeholder="یک تسک جدید وارد کنید...!" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="task">
                    <div class="p-2 mt-3 rounded-1 my-w-75 d-flex justify-content-between align-items-center my-pos-rel overflow-hidden category-task" style="border: 1px solid rgb(84, 84, 84);" >
                        <p class="my-font-IYM my-f-13">این یک تسک جدید است</p>
                        <i class="bi bi-chevron-down my-f-18 my-pointer icon-open-task" @click="show_sub_task()"></i>
                    </div>
                    <div class=" mt-1 rounded-1 my-w-75 list-sub-task" style="border: 1px solid rgb(84, 84, 84);">
                        <ul>
                            <li class="my-f-12 py-2 my-pointer my-color-b-700 my-font-IYL">
                                <p>ورزش ساعت 8:50 شروع و 9:50 به اتمام برسد</p>
                            </li>
                        </ul>
                        <div class="input-group mb-3 mt-5 my-w-75-i">
                            <button class="btn btn-outline-secondary my-font-IYL my-f-14-i px-4" type="button" id="button-addon1">ثبت</button>
                            <input dir="rtl" type="text" class="form-control my-f-12-i border-1 border-secondary my-w-50 my-font-IYM" placeholder="اضافه کردن زیر تسک جدید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from "jquery";
export default {

    name:'indexPageVue',
    data:()=>({
        text:'HI Vue!'
    }),mounted(){

    },methods:{
        show_sub_task(){
            $('.list-sub-task').stop().slideToggle()
        }
    }

}
</script>
