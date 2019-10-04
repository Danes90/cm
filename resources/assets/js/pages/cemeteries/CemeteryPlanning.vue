<template>
    <div class="container-fluid">
        <span
            v-cm-draggable
            class="test"
            >Draggable element</span>

        <div 
            v-cm-droppable 
            class='dropZone'
            >Drop zone</div>
    </div>
    
</template>

<script>
import { CmDraggable } from '../../directives/CmDraggable.js'
import { CmDroppable } from '../../directives/CmDroppable.js'

export default {
    name: 'cemetery-planning',
    methods: {
        addElementToStage(json) {
            console.log(json)
        }
    },
    directives: {
        CmDraggable,
        CmDroppable
    }
}
</script>

<style>
    .dropZone {
        width: 200px;
        height: 200px;
        background-color: red;
    }
</style>