<template>
     <div class="p-container objektlist">
          <div class="objektlist-block">
               <div v-if="apiErrorMessage != ''">
                    <span style="color: red;font-size:14px;">{{ apiErrorMessage }}</span>
               </div>
               <div>
                    <form v-if="apiErrorMessage == ''" @submit.prevent="handleEinstellungSubmit">
                         <div class="p-content-title">
                              <div class="caption">
                                   <span class="caption-word bold">Einstellungen bearbeiten</span>
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
                                             <input autoFocus key="title" maxlength="100" type="text" v-model="this.form.objListName" @input="chkEmptyInput" class="form-control focus:border focus:border-primary-color-500 focus:outline-1 focus:shadow-none" placeholder="Meine Objektliste" required>
                                             <div class="form-text text-muted">Der Name der Objektliste, welcher zur internen Verwaltung dient.<span style="color: red;font-size:14px;" >{{ error['chkNamevalErr'] }}</span></div>
                                        </div>
                                   </div>
                                   <div class="mb-4 row text-color">
                                        <label class="col-md-4 sm:control-label text-left sm:text-right">Domain*
                                        <span class="required" aria-required="true"></span>
                                        </label>
                                        <div class="col-md-8">
                                             <input key="domain" maxlength="100" type="text" v-model="form.domainName" @input="chkEmptyInput" @blur="e => validateDomain(e)"  class="form-control  backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none" placeholder="ihre-domain.de" required>
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
                                             <select id="" key="type" v-model="form.type" class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none">
                                                  <option value="1">Alle aktiven Objekte</option>
                                                  <option value="3">Objektreferenzen</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="mb-4 row text-color">
                                        <label class="col-md-4 sm:control-label sm:text-right">Objektart
                                        </label>
                                        <div class="col-md-8">
                                             <select id="" key="objektart" v-model="form.objektart" class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none">
                                                  <option :key="0" :value="0">Alle Objektarten</option>
                                                  <option v-for="objectart in objectarts" :key="objectart.id" :value="objectart.id">{{ objectart.name }}</option>
                                             </select>
                                        </div>
                                   </div>



                                   <div class="mb-4 row text-color">
                                        <label class="col-md-4 sm:control-label sm:text-right">Vermarktungsarten
                                        </label>
                                        <div class="col-md-8">
                                             <div class="v_art_div">
                                                  <label  :class="{ 'bg-on-selected': form.vermarktungsart == ''}" v-bind:key="0">
                                                       <input type="radio" name="vermarktungsarten" value="" id="v_all" v-model="form.vermarktungsart" hidden/>
                                                       <span>Alle</span>
                                                  </label>
                                                  <label :class="{ 'bg-on-selected': form.vermarktungsart == 'KAUF'}" v-bind:key="10000000001">
                                                       <input name="vermarktungsarten" type="radio" value="KAUF" id="v_kauf" v-model="form.vermarktungsart" hidden> <span class="">Kauf</span>
                                                  </label>
                                                  <label :class="{ 'bg-on-selected': form.vermarktungsart == 'MIETE'}" v-bind:key="10000000010" style="border-right: none;">
                                                       <input name="vermarktungsarten" type="radio" value="MIETE" id="v_miete" v-model="form.vermarktungsart" hidden> <span class="">Miete</span>
                                                  </label>
                                             </div>
                                             <!-- <span>vermarktungsart: {{ sel_vermarktungsart }}</span> -->
                                        </div>
                                   </div>
                                   <div class="mb-4 row text-color">
                                        <label class="col-md-4 sm:control-label sm:text-right">Nutzungsarten
                                        </label>
                                        <div class="col-md-8">
                                             <div class="n_art_div">
                                                  <label :class="{ 'bg-on-selected': form.nutzungsart == ''}" v-bind:key="0">
                                                       <input type="radio" name="nutzungsarten" value="" v-model="form.nutzungsart" hidden /><span class="">Alle</span> 
                                                  </label>
                                                  <label :class="{ 'bg-on-selected': form.nutzungsart == 'WOHNEN'}" v-bind:key="1">
                                                       <input type="radio" name="nutzungsarten" value="WOHNEN" v-model="form.nutzungsart" hidden /><span class="" >Wohnen</span>
                                                  </label>
                                                  <label :class="{ 'bg-on-selected': form.nutzungsart == 'GEWERBE'}" v-bind:key="1">
                                                       <input type="radio" name="nutzungsarten" value="GEWERBE" v-model="form.nutzungsart" hidden /><span class="" >Gewerbe</span>
                                                  </label>
                                                  <label :class="{ 'bg-on-selected': form.nutzungsart == 'ANLAGE'}" v-bind:key="1"  style="border-right: none;">
                                                       <input type="radio" name="nutzungsarten" value="ANLAGE" v-model="form.nutzungsart" hidden /><span class="">Anlage</span>
                                                  </label>
                                             </div>
                                        </div>
                                   </div>
                                   
                                   <div class="mb-4 row">
                                        <label class="col-md-4 sm:control-label sm:text-right">Filter anzeigen</label>
                                        <div class="col-md-8">
                                             <label class="control-label">
                                                  <input type="checkbox" name="filter" value="0" v-model="form.filter" /> <span class="ml-2 mt-2">Filter nach Standort, Kauf/Miete, Objektarten, Ausstattung (Preis, Zimmer, Fläche, Baujahr) </span>
                                             </label>
                                        </div>
                                   </div> 
                                   <!-- <hr class="mb-4"/> -->
                                   
                                   <div class="mb-4 row">
                                        <div class="col-md-12 text-right">
                                             <button type="submit" class="btn text-white width-100 bg-primary-color">Weiter</button>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <!-- <p>
                              <pre>
                                   data: {{ form }}
                              </pre>
                         </p> -->
                    </form>
               </div>
          </div>
     </div>
</template>


<script>
import router from '../../router'
import axios from 'axios'
import isValidDomain from "is-valid-domain";
export default {
     name:"objektlisteEinstellungBearbeiten",

     data() {
          return {
               form : {
                         objListName: '',
                         domainName: '',
                         type: '1',
                         objektart: "0",
                         vermarktungsart: '',
                         nutzungsart: '',
                         filter: false
                    },
                    objectarts: [],
                    objectList: [],
                    error : [],
                    apiErrorMessage: '',                    
                    output: 0,
          }
     },
     mounted() {
          this.getObjecttypes();
          this.getEinstellungsData(this.$route.params.id);
     },
     methods: {
          
          chkEmptyInput() {
               if(this.form.objListName.trim()){ this.error['chkNamevalErr'] = "";}
               if(this.form.domainName.trim()){ this.error['chkDomainErr'] = "";}
          },
          validateDomain(e) {
               let chkDomain;
               if( isValidDomain(this.form.domainName) || this.form.domainName === 'localhost' ) 
               {
                    this.error['chkDomainNameErr'] = "";
                    chkDomain = true;
               }
               else{
                    this.error['chkDomainNameErr'] = "(Bitte geben Sie einen gültigen Domainnamen ein.)";
                    e.target.focus();
                    e.target.select();
                    chkDomain = false;
               }
               return chkDomain;
          },
          handleEinstellungSubmit() {
               if(!this.form.objListName.trim()){ 
                    this.error['chkNamevalErr'] = "(Bitte geben Sie den Objektlistennamen ein.)"; 
                    return
                }
               if(!this.form.domainName.trim()){ 
                    this.error['chkDomainErr'] = "(Bitte geben Sie den richtigen Domainnamen ein.)"; 
                    return 
               }
               const chkDomain = this.validateDomain();
               if(chkDomain == true) {
                    this.updateEinstellungsData(); 
                    router.push( { name: 'objektlisteDesignBearbeiten', params: { id: this.$route.params.id}  })
               }
               
                    
          },
          
          async getEinstellungsData(objectListId) {
               try {
                    await axios.get(`/objectlists`) 
                    .then(response => {
                         if(response.status == 200)
                         {
                              this.objectList = response.data.filter((item) => item.id == objectListId )
                              if(this.objectList.length) {
                                   this.form.objListName = this.objectList[0].name;
                                   this.form.domainName = this.objectList[0].domain;
                                   this.form.type = this.objectList[0].type;
                                   this.form.objektart = this.objectList[0].objecttype;
                                   this.form.vermarktungsart = this.objectList[0].marketingtype;
                                   this.form.nutzungsart = this.objectList[0].typeofuse;
                                   this.form.filter = this.objectList[0].filter == 1 ? true : false;
                              } else {
                                   this.apiErrorMessage = "Es wurden keine passenden Daten gefunden";
                              }
                              
                         }
                         if(response.status == 404) {
                             this.apiErrorMessage =  'GET:: ' + response.data.message;
                         }    
                    })
                    .catch(error => {
                         if(error.response) {
                              this.apiErrorMessage = 'GET:: ' + error.response.data.message;
                         }
                    })
               }
               catch (err) {
                    this.apiErrorMessage = 'GET:: ' + err.message
               }
          },
          async updateEinstellungsData() {
               
               const updateBody = {
                    type: this.form.type.toString(), name: this.form.objListName, domain: this.form.domainName, objecttype: this.form.objektart.toString(), marketingtype:this.form.vermarktungsart, typeofuse: this.form.nutzungsart, country: "DEU", filter: this.form.filter, sort: 1, map_active: true, view_furnishing: true
               }

               try {
                    await axios.put(`/objectlists/${this.$route.params.id}/settings`, updateBody)
                    .then(response => {    
                         if(response.status == 200) {
                              this.output = 1;
                         }                              
                    })
                    .catch(error => {
                         this.apiErrorMessage = 'UPDATE: ' + error.response.data.message;
                    })
               }
               catch (err) {
                    this.apiErrorMessage = 'UPDATE: ' + err.message
               }
               return this.output;
          },
          async getObjecttypes() {
               await axios.get(`/objecttypes`)
               .then(response => {
                    if(response.status == 200) {
                         this.objectarts = response.data;
                    } else {
                         this.apiErrorMessage = 'GET: ' + response.data.message;
                    }

               })
               .catch(error => {
                    this.apiErrorMessage = 'GET: ' + error.response.data.message;
               });
          },
          /* getVermarktungsArt(vermarktungsart) {
               let vermarktungsArt = "0";
               if(vermarktungsart == '10000000001') { vermarktungsArt = '10000000001' }
               else if(vermarktungsart == '10000000010') { vermarktungsArt = '10000000010' }
               return vermarktungsArt;
          },
          getNutzungsArt(nutzungsart) {
               let chk_nutzungsArt = [];
               let isNutzungsart = 0;
               if(nutzungsart && nutzungsart !== ',,' ) {
                    isNutzungsart = 1;
                    chk_nutzungsArt = nutzungsart.split(',').map(s => s.trim());
                    
               }
               return [ {'isNutzungsart': isNutzungsart}, {'chk_nutzungsArt': chk_nutzungsArt} ]
          } */
     }
}
</script>

<style scoped>
     .bg-on-selected {
          background-color: #0097B1!important;
          color: #ffffff!important;
     }
     
</style>