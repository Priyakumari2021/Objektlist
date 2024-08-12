<template>
     <div class="p-container objektlist" style="clear:both">
          <div class="p-content">
               <div class="container">
                         <div class="objektlist mb-3 sm:px-0">
                              <!-- <p>Hier können Sie Objektlisten erstellen, welche Sie anschließend auf Ihrer Webseite einbinden können.</p>
                              <p>Bitte klicken Sie dazu auf <b>Objektliste erstellen</b> und folgen Sie den Anweisungen. Sie erhalten im Anschluss einen HTML Code, den Sie auf Ihrer Webseite einbinden können.</p>
                              <div class="alert alert-warning" role="alert">
                                   Allgemeiner Hinweis: 
                                   Bitte legen Sie bei Ihren Immobilien einen Ansprechpartner fest, da es sonst bei der Einbindung der Ivd24 Objektlisten auf Ihrer Webseite zu einem Serverfehler 500 kommen kann
                              </div> -->
                              <div class="mx-auto lg:block">
                                   <h2 class="text-xl lg:mb-3 mb-3">Ihre erstellten Listen</h2>
                                   <div  v-if="apiErrorMsg != ''"><span style="color: red;font-size:16px;" >{{ apiErrorMsg }}</span></div>
                                   <div v-if="objektlists.length">
                                        <ul  class="flex flex-col gap-4 items-center" style="list-style: none;">
                                             <li v-for="(objList, index) in objektlists" :key="index" class="row p-3 w-full border transition-shadow duration-300 bg-white rounded-md shadow-inner hover:shadow-md group">
                                                  <div class="font-lato-r col-md-6 flex flex-col self-center"><span class="mb-2 text-primary-color">({{ objList.id }}) {{ objList.name }}</span><span> {{ objList.domain }}</span></div>
                                                  <div class="col-md-6 flex flex-row justify-end items-center py-3">
                                                       <div class="mr-5">
                                                            <RouterLink  :to="{ name: 'objektlisteEinstellungBearbeiten', params: { id: objList.id }}" class="text-center">
                                                                 <img src="../../../images/edit_icon.svg" width="28" alt="" title="Die Bearbeitung der Objekte" />
                                                            </RouterLink >
                                                       </div>

                                                       <div class="mr-5">
                                                            <RouterLink :to="{ name: 'objektlisteCode', params: { id: objList.id }}">
                                                                 <img src="../../../images/code.svg" width="28" alt="" title="Die Code anschauen" />
                                                            </RouterLink>
                                                       </div>
                                                       <div class="mr-5">
                                                            <RouterLink  :to="{ name: 'objektlisteVorschau'}" class=""><img src="../../../images/eye.svg" width="28" alt="" title="Das Vorschau der Objekte" /></RouterLink>
                                                       </div>
                                                       <div class="mr-5 flex items-center ">
                                                            <label class="relative inline-block cursor-pointer">
                                                                 <input type="checkbox" class="sr-only peer" :value="objList.active" :name="objList.id" @change="(e) => deactivateOrActivateObjectlist(e, objList.id)" :checked="objList.active">
                                                                 <div class="w-11 h-6 bg-gray-200 rounded-full  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-500"></div>
                                                            </label>
                                                       </div>
                                                       <div class="mr-5">
                                                            <button type="button" class="" @click="deleteObjectlist(objList.id)">
                                                                 <img src="../../../images/delete.svg" width="28" alt="" title="löschen" />
                                                            </button>
                                                       </div>
                                                  </div>
                                                  <!-- <span>Active: {{  objList.id }}-----{{ active }}</span> -->
                                             </li>
                                        </ul>
                                                                 
                                   </div>
                                   <div v-else-if="!objektlists.length">
                                        <span>Keine Objektliste gefunden!</span>
                                   </div>
                                   <div v-else> Loading..</div>
                              </div>
                         </div>
               </div>
          </div> 
     </div>
</template>


<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
export default {
     name:"objektlisteList",
     data() {
          return {
               objektlists: [],
               apiErrorMsg: '',
               error: "",
          }
     },
     mounted() {
          this.getObjectLists();
     },
     methods: {
          async getObjectLists() {
               try {
                    await axios.get(`/objectlists`)
                         .then(response => {
                              if(response.status == 200) {
                                   this.objektlists = response.data;
                                   //console.log(this.objektlists);
                                   if (!this.objektlists) {
                                        this.error = "kein Objektlist gefunden..";
                                   }
                              }
                         })
                         .catch(error => {
                              this.apiErrorMsg = 'GET: ' + error.response.data.message;
                         });
               }
               catch (err) {
                    this.apiErrorMsg = err;
               }
          },
          async deleteObjectlist(id) {
               try{
                    await  axios.delete(`/objectlists/${id}`)
                    .then(response => {
                         if(response.status == 200)
                              {
                                  this.getObjectLists();
                              }

                    })
                    .catch(error => {
                         this.apiErrorMsg = 'DELETE: ' + error.response.data.message;
                    }) 
               }
               catch(err){
                    this.error = err.message;
               }
          },
          async deactivateOrActivateObjectlist(e, id) {   
               const setActiveVal = ( (e.target.value == 'false') ? { active: true } : { active: false } ) ;
               await axios.put(`/objectlists/${id}/active`, setActiveVal)
               .then(response => {
                    if(response.status == 200){
                         this.getObjectLists();
                    }
               })
               .catch(error => {
                    this.apiErrorMsg = 'ACTIVE: ' + error.response.data.message;
               })
               
          }
     },
     components: { RouterLink }
}
</script>

<style scoped>
</style>