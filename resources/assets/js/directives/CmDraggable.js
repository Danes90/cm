import Vue from 'vue'
import 'jquery-ui/ui/widgets/draggable'

export const CmDraggable = {
    inserted: function(el) {
        $(el).draggable({
            helper: 'clone',
            cursor: 'pointer',
            revert: 'invaild',
            snap: 'true',
            snapTolerance: 15
        })
    }
}

Vue.directive('cm-draggable', CmDraggable)