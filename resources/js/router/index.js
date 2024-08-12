import { createRouter, createWebHistory } from 'vue-router'


import Objektlisten from '../components/Objectlists/Objektliste-Lpage.vue'
import ObjektlisteList from '../components/Objectlists/Objektliste-List.vue'
import ObjektlisteErstellen from '../components/Objectlists/Objektliste-Erstellen.vue'
import ObjektlisteEinstellungBearbeiten from '../components/Objectlists/Objektliste-Einstellung-Bearbeiten.vue'
import ObjektlisteDesignBearbeiten from '../components/Objectlists/Objektliste-Design-Bearbeiten.vue'
import ObjektlisteCode from '../components/Objectlists/Objektliste-Code.vue'
import ObjektlisteVorschau from '../components/Objectlists/Objektliste-vorschau.vue'

// Access the id parameter from the current route's params object
//const id = this.$route.params.id;
const routes = [     
     {
          path: '/objectlists',
          name: 'objektlisten',
          component: Objektlisten
     },     
     {
          path: '/lists',
          name: 'objektlisteList',
          component: ObjektlisteList
     },
     {
          path: '/objectlists/create',
          name: 'objektlisteErstellen',
          component: ObjektlisteErstellen
     },
     {
          path: '/objectlists/:id/settings',
          name: 'objektlisteEinstellungBearbeiten',
          component: ObjektlisteEinstellungBearbeiten
     },
     {
          path: '/objectlists/:id/design',
          name: 'objektlisteDesignBearbeiten',
          component: ObjektlisteDesignBearbeiten
     },
     {
          path: '/objectlists/:id/code',
          name: 'objektlisteCode',
          component: ObjektlisteCode
     },
     {
          path: '/objectlists/vorschau',
          name: 'objektlisteVorschau',
          component: ObjektlisteVorschau
     }
];

/* const routes = [     
     {
          path: route ('objectlists.vue'),
          name: 'objektlisten',
          component: Objektlisten
     },     
     {
          path: route('objectlists.index'),
          name: 'objektlisteList',
          component: ObjektlisteList
     },
     {
          path: route('objectlists.create'),
          name: 'objektlisteErstellen',
          component: ObjektlisteErstellen
     },
     {
          path: route('objectlists.update.settings'),
          name: 'objektlisteEinstellungBearbeiten',
          component: ObjektlisteEinstellungBearbeiten
     },
     {
          path: route('objectlists.update.design'),
          name: 'objektlisteDesignBearbeiten',
          component: ObjektlisteDesignBearbeiten
     },
     {
          path: '/objectlists/:id/code',
          name: 'objektlisteCode',
          component: ObjektlisteCode
     },
     {
          path: '/objectlists/vorschau',
          name: 'objektlisteVorschau',
          component: ObjektlisteVorschau
     }
]; */

const router = createRouter({
     history: createWebHistory("/estates"),
     routes
})
   
   export default router