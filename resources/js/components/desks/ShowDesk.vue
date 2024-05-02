<template>
  <div class="container">
   <div v-if="errored" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
   <span class="font-medium">Danger alert!</span> Ошибка загрузки данных
   </div>

   <div v-if="loading" role="status">
     <Loading/>
   </div>
   <div v-else>
      <label for="Заголок" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
      <input @blur="saveName" type="text" v-model="name" id="first_name" :class="[$v.name.$error ? errorClass : normalClass]" />
      <p v-if="!$v.name.required" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium text-red-600">Oops!</span> Обязательное поле</p>
      <p v-if="!$v.name.maxLength" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium text-red-600">Oops!</span> Максимальная длина: {{$v.name.$params.maxLength.max}}</p>
   </div>
   <form @submit.prevent="createList">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Добавление списка</label>
            <input  v-model="listName" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Введите название списка" required :class="{'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500': $v.listName.$error}"/>
            <p v-if="!$v.listName.required" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium text-red-600">Oops!</span> Обязательное поле</p>
            <p v-if="!$v.listName.maxLength" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium text-red-600">Oops!</span> Максимальная длина: {{$v.listName.$params.maxLength.max}}</p>

         </div>
    </div>
    <button type="submit" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить</button>
</form>
<div class="grid grid-flow-row-dense grid-cols-3 grid-rows-3">
   <div  v-for="deskList in deskLists" :key="deskList.id">
            <!-- <router-link  :to="{name: 'showDesk', params: {deskid: deskList.id}}"  href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-t shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"> -->
            <div  class="block max-w-sm p-6 bg-white border border-gray-200 rounded-t shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
   

               <div class="cursor-pointer">
                  <form @submit.prevent="updateDeskList(deskList.id, deskList.name)" v-if="desk_list_input_id == deskList.id" class="flex flex-row justify-between items-center">
                     <div v-if="loadingList" role="status">
                     <Loading/>
                     </div>
                     <input v-else v-model="deskList.name" type="text" id="first_name" class="mr-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Введите название списка" required :class="{'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500': $v.listName.$error}"/>
                     <i @click="desk_list_input_id = null" class="fa-solid fa-x"></i>
                  </form>
                  <div @click="desk_list_input_id = deskList.id" v-else class="flex flex-row justify-between items-center">
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ deskList.name }}</h5> 
                     <i class="fa-solid fa-pen"></i>
                  </div>
               </div>
               <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <a href="#">
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                  </a>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                     Read more
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                     </svg>
                  </a>
               </div>
            </div>
            <!-- </router-link> -->
            <button @click="deleteList(deskList.id)" class="w-full block max-w-sm mb-3 bg-transparent dark:border-gray-700 shadow hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-gray-200 hover:border-transparent rounded-b">
               Удалить
            </button> 

         </div>   
  </div>
</div>
</template>

<script>
import Loading from "./Loading";
import { required, maxLength } from 'vuelidate/lib/validators'
// import Loading from ".Loading.vue";
export default {
   props: [
      'deskid'
   ],
   components: {
      Loading
   },
   data(){
      return {
         name: null,
         list_name: null,
         errored: false,
         loading: true,
         errorClass: 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500',
         normalClass: 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
         deskLists: [],
         listName: null,
         desk_list_input_id: null,
         loadingList: false,
      }
   },
   methods:{
      updateDeskList(id, name){
         this.loadingList = true;
         axios.post('/api/desk-lists/'+id,{
               _method: 'PUT',
               name: name,
            })
            .then(response => {
               this.desk_list_input_id = null;
               // this.deskLists = this.deskLists.filter(item => item.id !== deskListid);
            })
            .catch(error => {
               console.log(error);
            })
            .finally(() => {
               this.loadingList = false;
            })
      },
      deleteList(deskListid){
         if(confirm('Вы действительно хотите удалить лист?')){
            axios.post('/api/desk-lists/'+deskListid,{
               _method: 'DELETE',
            })
            .then(response => {
               this.deskLists = this.deskLists.filter(item => item.id !== deskListid);
            })
            .catch(error => {
               console.log(error);
            })
            .finally(() => {
               this.loading = false;
            })
         }
      },
      createList(){

         this.loading = true

            console.log('createDesk')
            
         axios.post('/api/desk-lists/',{
            name: this.listName,
            desk_id: this.deskid
         })
         .then(response => {
            this.listName = '';
            this.deskLists.unshift(response.data.data);

         })
         .catch(error => {
            console.log(error);
         })
         .finally(() => {
            this.loading = false;
         })
      },

      getDeskLists(){
         axios.get('/api/desk-lists/',{
            params:{
               desk_id: this.deskid
            }
         })
         .then(response => {
            console.log(response);
            this.deskLists = response.data.data
         })
         .catch(error => {
            console.log(error);
            this.errored = true;
         })
         .finally(() => {
            this.loading = false;
         })
      },
      saveName(){
         this.$v.name.$touch()
         if(this.$v.name.anyError){
            return
         }
         axios.post('/api/desks/'+this.deskid,{
            _method: 'PUT',
            name: this.name
         })
         .then(response => {
            this.name = response.data.data.name
         })
         .catch(error => {
            console.log(error);
            this.errored = true;
         })
         .finally(() => {
            this.loading = false;
         })
      }
   },
   mounted(){
         axios.get('/api/desks/'+this.deskid)
         .then(response => {
            this.name = response.data.data.name
         })
         .catch(error => {
            console.log(error);
            this.errored = true;
         })
         .finally(() => {
            this.loading = false;
         })
         this.getDeskLists();
      },
      validations:{
         name: {
            required,
            maxLength: maxLength(255)
         },
         listName: {
            required,
            maxLength: maxLength(255)
         }

      }

}
</script>

<style>

</style>