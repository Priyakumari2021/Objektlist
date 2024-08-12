<template>
     <div class="p-container objektlist">
          <div class="objektlist-block">
               <div class="p-content-title">
                    <div class="caption">
                         <span class="caption-word bold">HTML Code</span>
                    </div>
                    <div class="p-create-new">
                         <RouterLink :to="{ name: 'objektlisten'}" class="btn text-white bg-primary-color ml-3">Abbrechen</RouterLink>
                    </div>
               </div>
               <div class="px-0 p-main-content">
                    <div class="objektlist-form-body"> 
                         <div class="mb-4 row text-color">
                              <div class="col-md-12">
                                   <textarea class="form-control" rows="5"><div id="immo1-container" data-id={{ this.objectlistId }}></div>
<script async src="https://www.immobilie1.de/wp-content/themes/immo1/js/objektlisten.js"></script>
</textarea>
                              </div>
                         </div>
                         
                         <div class="mb-4 row">
                              <div class="col-md-12 flex justify-between">
                                   <button type="button" @click="handleBack" class="btn bg-secondary-color"><i class="fa fa-arrow-circle-left"></i> Zurück</button>
                                   <button type="button"  @click="handleSubmit" class="btn text-white bg-primary-color">Weiter</button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>


<script>
import router from '../../router';
export default {
     name:"objektlisteCode",
     
     data(){
          return{
               objectlistId: this.$route.params.id
          }
     },

     methods:{

          handleSubmit() {
               //console.log("Submitted..");
               router.push({ name: 'objektlisten' })
          },
          handleBack() {
                    //const id = this.$route.params.id;
               //router.push({ path: `/${this.$route.params.id}/design-bearbeiten` });
               router.push({ name: 'objektlisteDesignBearbeiten', params: { id: this.$route.params.id } })
          }
     }
}
</script>

<style scoped>
</style>