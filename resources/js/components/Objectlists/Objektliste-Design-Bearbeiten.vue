<template>
     <div class="p-container objektlist">     
          <div class="objektlist-block"> 
               <div v-if="apiErrorMessage !=''">
                    <span style="color: red;font-size:14px;">
                         {{ apiErrorMessage }}
                    </span>
               </div>
               <form v-if="apiErrorMessage ==''" @submit.prevent="handleDesignSubmit">
                    <div class="p-content-title">
                         <div class="caption">
                              <span class="caption-word bold">Designdaten</span>
                         </div>
                         <div class="p-nav p-create-new">
                              <RouterLink :to="{ name: 'objektlisten'}" class="btn text-white bg-primary-color ml-3">Abbrechen</RouterLink>
                         </div>
                    </div>
                    <div class="px-0 p-main-content">
                         <div class="objektlist-form-body">
                              <div class="mb-4 row">
                                   <label class="col-sm-4 sm:control-label sm:text-right">Anzahl pro Seite</label>
                                   <div class="col-sm-8">
                                        <input type="number" class="form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none" name="limit" v-model="form.limit"  />
                                   </div>
                              </div>												
                              <div class="mb-4 row">
                                   <label class="col-sm-4 sm:control-label sm:text-right">Darstellung</label>
                                   <div class="col-sm-8">
                                        <select class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none" name="darstellung" v-model="form.display">
                                             <option Key="1" value="tile">Kachel</option>
                                             <option Key="2" value="list">Liste</option>
                                        </select>
                                   
                                   </div>
                              </div>
                              <div class="mb-4 row" v-if="form.display == 'tile'">
                                   <label class="col-md-4 sm:control-label sm:text-right">Anzahl Kacheln nebeneinander</label>
                                   <div class="col-md-8">
                                        <select class="form-select form-control backdrop-opacity-100 focus:border focus:border-primary-color focus:outline-1 focus:shadow-none" name="anzahl_kacheln" v-model="form.number_tiles">
                                             <option Key="2" value="2">2</option>
                                             <option Key="3" value="3">3</option>
                                             <option Key="4" value="4">4</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Anbieter Widget</label>
                                   <div class="col-md-8">
                                   <label class="control-label mt-3">
                                        <input class="align-middle h-6 w-6" type="checkbox" name="anbieter_widget_active" value="1" v-model="form.broker_widget_active"/>
                                   </label>
                                   </div>
                              </div>

                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Eigenes Design verwenden</label>
                                   <div class="col-md-8">
                                        <label class="control-label mt-3">
                                             <input class="align-middle h-6 w-6" type="checkbox" name="custom_design" value="1" v-model="form.custom_design"/>
                                             <span class=""></span>
                                        </label>
                                   </div>
                              </div>
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Abgerundete Ecken</label>
                                   <div class="col-md-8 flex">
                                        <input type="number" class="form-control block w-full shadow-sm text-sm focus:z-10  rounded-r-none border-e-0" name="border_radius" v-model="form.border_radius" />

                                        <span class="px-4 inline-flex items-center min-w-fit rounded-r-md border-y border-r border-slate-400 bg-gray-50 text-sm text-gray-500">px</span>     
                                   </div>
                              </div> 
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Balken-Farbe</label>
                                   <div class="col-md-8">
                                             <div class="color-content flex">
                                                  <input type="color" class="form-control" name="color_border" v-model="form.color_border"/> 
                                                  <label class="sm:control-label">Hintergrundfarbe</label>
                                                  <input type="color" class="form-control" name="color_background" v-model="form.color_background"/>                                                    
                                             </div>
                                             
                                   </div>
                              </div>
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Button-Schriftfarbe</label>
                                   <div class="col-md-8">
                                        <div class="color-content flex"> 
                                             <input type="color" class="form-control" name="color_button_font" v-model="form.color_button_font"/> 
                                             <label class="sm:control-label">Schriftfarbe&emsp;&emsp;</label>
                                             <input type="color" class="form-control" name="color_font" v-model="form.color_font"/>
                                        </div>
                                        
                                   </div>
                              </div>
                              <div class="mb-4 row">
                                   <label class="col-md-4 sm:control-label sm:text-right">Button-Farbe</label>
                                   <div class="col-md-3">    
                                        <input type="color" class="form-control" name="color_button_background" v-model="form.color_button_background"/>
                                   </div>
                              </div>

                              <div class="pt-4 row">
                                   <div class="col-md-12 flex justify-between">
                                        <button type="button" @click="handleBack" class="btn bg-secondary-color"><i class="fa fa-arrow-circle-left"></i> Zurück</button>
                                        <button type="button" @click="handleVorschau" class="btn bg-secondary-color" id="vorschau">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="0.8em" height="0.8em" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32zM80 32C35.8 32 0 67.8 0 112v320c0 44.2 35.8 80 80 80h320c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v112c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h112c17.7 0 32-14.3 32-32s-14.3-32-32-32z"/></svg>
                                              Vorschau
                                        </button>                                
                                        <button type="submit" class="btn text-white bg-primary-color">Weiter</button>
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

     <div v-if="show" class="p-container objektlist" id="preview">     
          <div class="objektlist-block">
               <div class="p-content-title">
                    <div class="caption">
                         <span class="caption-word bold">Vorschau</span>
                    </div>
               </div>

               <div class="px-0 p-main-content">
                    <div class="">
                         <div className="col" id='objectlistContainer'>
                              <div id="immo1-objectlistContainer">My Objektlist</div>
                         </div>
                    </div>
               </div>
          
          </div>
     </div>

</template>


<script>
import router from '../../router';
import axios from 'axios'
export default {
     name: "objektlisteDesignBearbeiten",

     data() {
          return {

                    form : {
                         limit: 20,
                         display: 'tile',
                         broker_widget_active: 0,
                         number_tiles: 4,
                         custom_design: 0,
                         border_radius: 5,
                         color_border: "#8a8a8a",
                         color_button_font: "#ffffff",
                         color_background: "#f0f0ef",
                         color_font: "#000000",
                         color_button_background:"#8a8a8a"
                    },
                    error: [],
                    apiErrorMessage: '',
                    show: false
                    }
     },
     mounted() {
          this.getDesignData(this.$route.params.id);
     },
     methods: {
          async getDesignData(id) {
               try{
                    await axios.get(`/objectlists`)
                    .then(response => {
                         const objectList = response.data.filter((item) => item.id == id)
                         console.log(objectList);
                         this.form.limit = objectList[0].limit;
                         this.form.display = objectList[0].display
                         this.form.broker_widget_active = (objectList[0].broker_widget_active == 1 ? true : false );
                         this.form.number_tiles = objectList[0].number_tiles 
                         this.form.custom_design = (objectList[0].custom_design == 1 ? true : false);
                         this.form.border_radius = objectList[0].border_radius; 
                         this.form.color_border = objectList[0].color_border;
                         this.form.color_button_font = objectList[0].color_button_font; 
                         this.form.color_background = objectList[0].color_background;
                         this.form.color_font = objectList[0].color_font  
                         this.form.color_button_background = objectList[0].color_button_background          
                    })
                    .catch(error => {
                         if(error.response) {
                              this.apiErrorMessage = 'GET: ' + error.response.data.message;
                         }
                    });
               }
               catch(err){
                    this.apiErrorMessage = 'GET: ' + err;
               }
          },
          async handleDesignSubmit() {

               const updateDesignData = {
                    limit: this.form.limit, display: this.form.display, broker_widget_active: this.form.broker_widget_active, number_tiles: this.form.number_tiles, custom_design:this.form.custom_design, border_radius: this.form.border_radius, color_border: this.form.color_border, color_button_font: this.form.color_button_font, color_background: this.form.color_background, color_font: this.form.color_font, color_button_background: this.form.color_button_background
               }
               if(this.form.limit <= 10) this.form.limit = 10;
               if(this.form.border_radius == '') this.form.border_radius = 0;  
               await axios.put(`/objectlists/${this.$route.params.id}/design`, this.form)
               .then(response => {
                    if(response.status == 200) {
                         router.push({ name: 'objektlisteCode', params: { id: this.$route.params.id } })
                    }
               })
               .catch(error => {
                    this.apiErrorMessage = 'HANDLE: ' + error.response.data.message;
               })
               
          },
          handleBack() {
               router.push({ name: 'objektlisteEinstellungBearbeiten', params: { id: this.$route.params.id } })
               
          },
          handleVorschau() {
               this.show = !this.show;
          }
     }
}
</script>

<style scoped>
.width-6{
     width: 1.5rem!important;
}
.height-6{
     height: 1.5rem!important;
}
svg {
     display: inline;
     fill: #0097B1;
}
#vorschau:hover svg {
     fill: #ffffff;
}

</style>