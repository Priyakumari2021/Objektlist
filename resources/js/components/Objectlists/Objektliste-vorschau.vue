<template>
     <div class="p-container objektlist">          
          <div class="objektlist objektlist-block"> 
               <div class="p-content-title">
                    <div class="caption">
                         <span class="caption-word bold">Vorschau</span>
                    </div>
                    <div class="p-nav p-create-new">
                         <RouterLink :to="{ name: 'objektlisten'}" class="btn text-white bg-primary-color ml-3">Abbrechen</RouterLink> 
                    </div>
               </div>
          </div>
     </div>
     
     <h2 class="bold">Objektlist vorschau page</h2>
</template>


<script>

export default {
     name:"objektlisteVorschau",
}
</script>

<style scoped>
</style>