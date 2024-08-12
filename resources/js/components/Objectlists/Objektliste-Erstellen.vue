<template>
     <div class="p-container objektlist">
          <div class="objektlist objektlist-block">                         
               <form @submit.prevent="handleSubmit">
                    <div class="p-content-title">
                         <div class="caption">
                              <span class="caption-word bold">Objektliste erstellen</span>
                         </div>
                         <div class="p-nav p-create-new">
                              <RouterLink :to="{ name: 'objektlisten'}" class="btn text-white bg-primary-color ml-3">Abbrechen</RouterLink> 
                         </div>
                    </div>
                    <div class="px-0 p-main-content">
                         <div class="objektlist-form-body">                                   
                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Bezeichnung*
                                   <span class="required" aria-required="true"></span>
                                   </label>
                                   <div class="col-md-8">
                                        <input autoFocus key="title" maxlength="100" type="text" v-model="model.form.objListName" @input="chkEmptyInput" class="form-control focus:border focus:border-primary-color-500 focus:outline-1 focus:shadow-none" placeholder="Meine Objektliste" required>
                                        <div class="form-text text-muted">Der Name der Objektliste, welcher zur internen Verwaltung dient.<span style="color: red;font-size:14px;" >{{ error['chkNamevalErr'] }}</span></div>
                                   </div>
                              </div>
                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Domain*
                                   <span class="required" aria-required="true"></span>
                                   </label>
                                   <div class="col-md-8">
                                        <input key="domain" maxlength="100" type="text" v-model="model.form.domainName" @input="chkEmptyInput" @blur="e => validateDomain(e)" class="form-control  backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none" placeholder="ihre-domain.de" required>
                                        <div class="form-text text-muted">Die URL der Webseite auf der Sie die Objektliste einbinden möchten.
                                             <span style="color: red;font-size:14px;" >
                                                  {{ error['chkDomainErr'] }}
                                             </span>
                                             <span style="color: red;font-size:14px;" >
                                                  {{ error['chkDomainNameErr'] }}
                                             </span>
                                        </div>
                                   </div>
                              </div>
                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Objektauswahl*
                                   </label>
                                   <div class="col-md-8">
                                        <select id="" key="type" v-model="model.form.type" class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none">
                                             <option value="1">Alle aktiven Objekte</option>
                                             <option value="4">Objektreferenzen</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Objektart
                                   </label>
                                   <div class="col-md-8">
                                        <select id="" key="objektart" v-model="model.form.objektart" class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none">  
                                             <option value="0">Alle Objektarten</option>
                                             <option v-for="objectart in objectarts" :key="objectart.id" :value="objectart.id">{{ objectart.name }}</option>
                                        </select>
                                   </div>
                              </div>

                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Vermarktungsarten
                                   </label>
                                   <div class="col-md-8 objektlist">
                                        <div class="v_art_div">
                                             <label :class="{ 'bg-on-selected': model.form.vermarktungsart == ''}" v-bind:key="0">
                                                  <input type="radio" name="vermarktungsarten" value="" v-model="model.form.vermarktungsart" hidden/><span class="">Alle</span>
                                             </label>
                                             <label :class="{ 'bg-on-selected': model.form.vermarktungsart == 'KAUF'}" v-bind:key="10000000001">
                                                  <input name="vermarktungsarten" type="radio" value="KAUF" v-model="model.form.vermarktungsart" hidden/> <span class="">Kauf</span>
                                             </label>
                                             <label :class="{ 'bg-on-selected': model.form.vermarktungsart == 'MIETE'}" v-bind:key="10000000010" style="border-right: none;">
                                                  <input name="vermarktungsarten" type="radio" value="MIETE" v-model="model.form.vermarktungsart" hidden/> <span class="">Miete</span>
                                             </label><br>
                                        </div>
                                   </div>
                              </div>
                              <div class="mb-4 row text-color">
                                   <label class="col-md-4 sm:control-label sm:text-right">Nutzungsarten
                                   </label>
                                   <div class="col-md-8">
                                        <div class="n_art_div">
                                             <label :class="{ 'bg-on-selected': model.form.nutzungsart == ''}" v-bind:key="0">
                                                  <input type="radio" name="nutzungsarten" value="" v-model="model.form.nutzungsart"  hidden /><span class="nutzung l_radius border_r">Alle</span> 
                                             </label>
                                             <label :class="{ 'bg-on-selected': model.form.nutzungsart == 'WOHNEN'}" v-bind:key="1">
                                                  <input type="radio" name="nutzungsarten" value="WOHNEN" v-model="model.form.nutzungsart" hidden /><span class="nutzung border_r" >Wohnen</span>
                                             </label>
                                             <label :class="{ 'bg-on-selected': model.form.nutzungsart == 'GEWERBE'}" v-bind:key="1">
                                                  <input type="radio" name="nutzungsarten" value="GEWERBE" v-model="model.form.nutzungsart" hidden /><span class="nutzung border_r" >Gewerbe</span>
                                             </label>
                                             <label :class="{ 'bg-on-selected': model.form.nutzungsart == 'ANLAGE'}" v-bind:key="1" style="border-right: none;">
                                                  <input type="radio" name="nutzungsarten" value="ANLAGE" v-model="model.form.nutzungsart" hidden /><span class="nutzung r_radius">Anlage</span>
                                             </label>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Filter anzeigen</label>
                                   <div class="col-md-8">
                                        <label class="control-label mr-3">
                                             <input class="align-middle h-5 w-5" type="checkbox" name="filter" value="0" v-model="model.form.filter" /> <span class="ml-2 mt-2">Filter nach Standort, Kauf/Miete, Objektarten, Ausstattung (Preis, Zimmer, Fläche, Baujahr) </span>
                                        </label>
                                   </div>
                              </div>
                              
                              <div class="mb-4 row">
                                   <div class="col-md-12 text-right">
                                        <button type="submit" class="btn text-white bg-primary-color">Weiter</button>
                                   </div>
                              </div>
                         </div>
                    </div>

               </form>
          </div>
     </div>
</template>


<script>
import router from '../../router'
import axios from 'axios';
import isValidDomain from "is-valid-domain";

export default {
     name:"objektlisteErstellen",

     data() {
          return {
               model : {
                    form: {
                         objListName: '',
                         domainName: '',
                         type: '1',
                         objektart: '0',
                         vermarktungsart: '',
                         nutzungsart: '',
                         filter: false
                    },
               },
               objectarts: [],
               error: [],
               apiErrorMsg : '',
               validationError:'',
               newId: '',
          }
     },
     mounted() {
          this.getObjecttypes();
     },
     methods: {          
          async handleSubmit() {
               if(!this.model.form.objListName.trim()){ this.error['chkNamevalErr'] = "(Bitte geben Sie Objektlistname ein!)"; return }
               if(!this.model.form.domainName.trim()){ this.error['chkDomainErr'] = "(Bitte geben Sie richtige Domainname ein!)"; return }               

               this.model.form.filter = this.model.form.filter == false ? 0 : 1;
               const insertBody = {
                    type: this.model.form.type, name: this.model.form.objListName, domain: this.model.form.domainName, objecttype: this.model.form.objektart.toString(), marketingtype:this.model.form.vermarktungsart, typeofuse: this.model.form.nutzungsart, country: "DEU", filter: this.model.form.filter, sort: 1, map_active: true, view_furnishing: true
               }
               await axios.post(`/objectlists`, insertBody)
               .then(response => { 
                    if(response.status == 200) {
                         this.newId = response.data.id;                         
                         router.push({ name: 'objektlisteDesignBearbeiten', params: { id: this.newId } })
                    }
                    
               })
               .catch(error => {
                    this.apiErrorMsg = error.response.data.message;
               });
          },
          async getObjecttypes() {
               await axios.get(`/objecttypes`)
               .then(response => {
                    if(response.status == 200) {
                         this.objectarts = response.data;
                    } else {
                         this.apiErrorMsg = response.data.message;
                    }

               })
               .catch(error => {
                    this.apiErrorMsg = error.response.data.message;
               });
          },
          chkEmptyInput() {
               if(this.model.form.objListName.trim()){ this.error['chkNamevalErr'] = "";}
               if(this.model.form.domainName.trim()){ this.error['chkDomainErr'] = "";}
          },
          validateDomain(e) {
               if( isValidDomain(this.model.form.domainName) || this.model.form.domainName === 'localhost' ) 
               {
                    this.error['chkDomainNameErr'] = "";
                    return true;
               }
               else{
                    this.error['chkDomainNameErr'] = "(Bitte geben Sie eine gültigen Domainnamen ein!)";
                    e.target.focus();
                    e.target.select();
                    return false;
               }
          }
     }
}
</script>

<style scoped>
.bg-on-selected {
     background-color: #0097B1!important;
     color: #ffffff!important;
}
</style>