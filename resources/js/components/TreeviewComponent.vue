<template>
    <div>
        <ul class="w-full">
            <li v-for="node in treeviewNodes" :key="node.key">
                <div class="min-h-10 flex items-center border border-stats-300 rounded p-2 hover:bg-teal-50 hover:text-teal-600" :class="{'bg-teal-50 text-teal-600': node.isSelected}" >
                        <span v-if="node.children" class="w-8 h-8 flex items-center justify-center hover:cursor-pointer hover:bg-white hover:rounded-full" @click="toogleExpanded(node.key)">
                            <em class="bi" :class="{'bi-chevron-compact-right': !node.isExpanded, 'bi-chevron-compact-down': node.isExpanded}" />
                        </span>
                        <span v-if="node.children" class="h-8 w-8 flex items-venter justify-center">
                            <i v-if="!node.children" class="bi bi-file-earmark" />
                            <em v-else class="bi" :class="{'bi-folder': !node.isExpanded, 'bi-folder2-open': node.isExpanded}" />
                        </span>
                </div>
                <treeview v-show="node.isExpanded"
                          v-if="node.children"
                          :items="node.children"
                          :is-child="true"
                          @change-selection="($event) => $emit('change-selection', $event)"
                          />
                <span class="hover:underline hover:cursor-pointer"  @click="changeSelection(node.key)">
                    {{node.title}}
                </span>
            </li>
        </ul>
    </div>
</template>
<script>
import EventBus from 'mitt'

export default {
    name: 'Treeview',
    props: {
        items:{
            type: Array,
            requires:true
        },
        isChild:{
            type: Boolean,
            default:false
        }
    },
    data(){
        return {
            treeviewNodes: []
        }
    },
    created(){
        this.treeviewNodes = this.mapTreeviewNodes(this.items)
        EventBus.bind('on','clear-treeview-selection', this.removeSelection)
    },
    beforeDestroy() {
      EventBus.bind('off', 'clear-treeview-selection', this.removeSelection)
    },
    methods: {
        mapTreeviewNodes(items) {
            return Object.values(items).map((item) => ({
                ...item,
                isExpanded:false,
                isSelected: false,
                children: item.children? this.mapTreeviewNodes(item.children):null
            }))
        },
        toogleExpanded(key){
            const node = this.treeviewNodes.find((i) => i.key === key)
            node.isExpanded = !node.isExpanded
        },
        changeSelection(key){
            EventBus.bind('emit','clear-treeview-selection')
            const node = this.treeviewNodes.find((i) => i.key === key)
            node.isSelected = true
            EventBus.bind('emit','change-selection', node)
        },
        removeSelection(){
            this.treeviewNodes.forEach((node) => {
                node.isSelected = false
            })
        }
    }
}

</script>
<style>

</style>
