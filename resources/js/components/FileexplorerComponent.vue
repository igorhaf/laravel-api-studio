<template>
    <div class="flex-col justify-center">
        <h1 class="text-2x1 text-semi-bold">file explorer</h1>
        <div class="w-4/12 mt-8">
            <treeview-component :items="treeviewItens" @change-selection="onChengeSelection" />
        </div>
    </div>
</template>

<script>
import Treeview from "./TreeviewComponent";

export default {
    name: 'FileExplorer',
    components: {Treeview},
    data(){
        return {
            treeviewItens:[
                {
                    key: '234234234',
                    title: "primeiro item",
                    children: {
                        key: '234234234qe2qw',
                        title: 'primeiro filho'
                    }
                },
                {
                    key: '234234234',
                    title: "segund item"
                }
            ]
        }
    },
}

</script>
<style>

</style>

