import Vue from 'vue'
import 'jquery-ui/ui/widgets/droppable'

export const CmDroppable = {
    bind: function(el, binding, vnode) {
        $(el).droppable({
            drop: function(e,ui) {

                // TODO: Konva.Rect instance-hoz json előállítása

               // Componens függvény hívás 
               var json = {rect:'Konva Rect Options'}
               vnode.context.addElementToStage(json)
            }
        })
    }

}

Vue.directive('cm-droppable', CmDroppable)