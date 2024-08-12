<template>
     <div class="p-container objektlist">
          <div class="objektlist-block">
               <p class="">Mit Objektlisten können Sie Ihre Immobilien unkompliziert auf Ihrer eigenen Webseite präsentieren.</p><br>
               <h3 class="bold">Ihre Vorteile:</h3><br>
               <ul>
                    <li>- Einfache Integration auf Ihre Webseite</li>
                    <li>- Anpassung von Schriftart und Farben an das Design Ihrer Seite</li>
                    <li>- Immer aktuelle Darstellung Ihres Immobilienbestands</li>
               </ul>
          </div>
          <div class="row">
               <div class="col-md-6">
                    <div class="objektlist-block">
                         <div class="block-title">
                              <div class="caption">
                                   <span class="text-xl">Objektliste erstellen</span> 
                              </div>
                         </div>
                         <div class="block-body pt-2">
                              <div class="pb-3" style="height: 150px;">
                                   <p>Mit Objektlisten können Sie ihre Objekte einfach auf Ihrer eigenen Webseite einbinden.</p><br>
                                   <p>Klicken Sie einfach auf 'Objektliste erstellen' und folgen Sie den Anweisungen. Sie erhalten dann einen HTML-Code, den Sie direkt in Ihre Webseite einfügen können.</p>

                                   
                              </div>
                              <div class="text-right">
                                   <hr class="style=border:0;border-top: 1px solid #eef1f5;border-bottom: 0;">
                                   <router-link :to="{ name: 'objektlisteErstellen'}" class="mt-2 btn text-white bg-primary-color width-100">Objektliste erstellen</router-link>                              
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="objektlist-block">
                         <div class="block-title">
                              <div class="caption">
                              <span class="text-xl">Objektliste verwalten</span> 
                              </div>
                         </div>
                         <div class="block-body pt-2">
                              <div class="pb-3" style="height: 150px;">
                                   <p>Klicken Sie auf Objektlisten verwalten, um bestehende Listen zu aktualisieren oder zu bearbeiten.</p>
                              </div>
                              <div class="text-right">
                                   <hr class="" style="border:0;border-top: 1px solid #eef1f5;border-bottom: 0;">
                                   <router-link :to="{ name: 'objektlisteList'}" class="mt-2 btn text-white bg-primary-color width-100">Objektliste verwalten</router-link>                              
                              </div>
                         </div>
                    </div>

               </div>
          </div>
          
     </div>
</template>


<script>
import { ref } from "vue";
export default {
     name:"Objektliste",

     data() {
          return {
               isInfo: ref(false)
          }
     },
     mounted(){
          console.log('mounted')
     },
     methods: {
          changeVal() {
               //console.log(this.isInfo);
               this.isInfo =!this.isInfo
          }
     }

}
</script>

<style scoped>
</style>