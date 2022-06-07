<template>
    <div>
        <ul class="w-full">
            <li v-for="node in treeviewNodes" :key="node.key">
                <div class="min-h-10 flex items-center border border-stats-300 rounded p-2 hover:bg-teal-50 hover:text-teal-600" :class="{'bg-teal-50 text-teal-600': node.isSelected}" >
                    <vue3-tree-vue :items="items"
                                   :isCheckable="false"
                                   :hideGuideLines="false"
                                   v-model:selectedItem="selectedItem">
                        <!-- Applying some simple styling to tree-items -->
                        <template v-slot:item-prepend-icon="treeViewItem" >
                            <img src="./assets/folder.svg"
                                 alt="folder"
                                 v-if="treeViewItem.type === 'folder'"
                                 height="20" width="20" />
                        </template>
                    </vue3-tree-vue>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>

import TreeViewItem from "TreeItemComponent"
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
    setup() {
        const selectedItems = ref<TreeViewItem[this.treeviewNodes]>([]);
        const items = ref<TreeViewItem[this.treeviewNodes]>([]); // define your tree items here.

        return {
            selectedItems,
            items
        }
    }
}

</script>
<style>

</style>
