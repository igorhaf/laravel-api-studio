<template>

<!--        <template #before-input="props">
            <i class="folder-closed-icon" v-if="checkProp(props.node, 0)" />
            <i class="php-icon" v-else-if="checkProp(props.node, 1)" />
            <i class="css-icon" v-else-if="checkProp(props.node, 2)" />
            <i class="javascript-icon" v-else-if="checkProp(props.node, 3)" />
            <i class="blade-icon" v-else-if="checkProp(props.node, 4)" />
            <i class="others-icon" v-else></i>
        </template>-->
    <tree :nodes="nodes" :config="config" @nodeOpened="addServerNode">
        <template #loading-slot>
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </template>
    </tree>
</template>

<script>
import treeview from "vue3-treeview";
import "vue3-treeview/dist/style.css";

export default {
    components: {
        tree: treeview,
    },
    data: function () {

        return {
            nodes: {
                id1: {
                    text: "text1",
                    children: ["id11", "id12"],
                },
                id11: {
                    text: "text11",
                },
                id12: {
                    text: "text12",
                },
                id2: {
                    text: "text2",
                },
            },
            config: {
                roots: ["id1", "id2"],
                leaves: ["fakeid"],
            },
        }
        /*return {
            nodes: {
                id1: {
                    text: "folder",
                    children: ["id11", "id12", "id13", "id14","id15"],
                    custom: {
                        prop: 0,
                    },
                },
                id11: {
                    text: "php",
                    custom: {
                        prop: 1,
                    },
                },
                id12: {
                    text: "css",
                    custom: {
                        prop: 2,
                    },
                },
                id13: {
                    text: "javascript",
                    custom: {
                        prop: 3,
                    },
                },

                id14: {
                    text: "blade",
                    custom: {
                        prop: 4,
                    },
                },

                id15: {
                    text: "others",
                    custom: {
                        prop: 5,
                    },
                },
                id16: {
                    text: "others",
                    custom: {
                        prop: 6,
                    },
                },
                id2: {
                    text: "folder",
                    custom: {
                        prop: 0,
                    },
                },
            },
            config: {
                roots: ["id1", "id2"],
                openedIcon: {
                    type: "class",
                    class: "opened-folder",
                },
                closedIcon: {
                    type: "class",
                    class: "closed-folder",
                },
            },
        };*/
    },
    methods: {
        checkProp(n, i) {
            return n.custom && Number.isFinite(n.custom.prop) && n.custom.prop === i;
        },

        addServerNode(n) {



            if (n.children && n.children.length > 0) return;

            // set node loading state to tree
            n.state.isLoading = true;

            // fake server call
            setTimeout(() => {
                // create a fake node

            $.ajax({
                url: "http://localhost/filetree",
                method:"post",
                data: JSON.stringify(['url_dir']), // Replace 'this' with self''
                contentType: 'application/json',
                dataType: 'json',
                context: this,
                success: function(json) {
                    let nodes;
                    nodes = JSON.parse(JSON.stringify(json))
                    $.each(nodes, function(k, v) {
                        // add the node to nodes
                        this.nodes[k] = v;
                    })
                }
            });

                // end loading
                n.state.isLoading = false;
            }, 2000);
        },
    },
};
</script>
<style>
.progress {
    position: relative;
    height: 4px;
    display: block;
    width: 100%;
    background-color: #aab6fe;
    border-radius: 2px;
    background-clip: padding-box;
    margin: 0.5rem 0 1rem 0;
    overflow: hidden;
}
.progress .indeterminate {
    background-color: #3f51b5;
}
.progress .indeterminate:before {
    content: "";
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395)
    infinite;
    animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
}
.progress .indeterminate:after {
    content: "";
    position: absolute;
    background-color: inherit;
    top: 0;
    left: 0;
    bottom: 0;
    will-change: left, right;
    -webkit-animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1)
    infinite;
    animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1)
    infinite;
    -webkit-animation-delay: 1.15s;
    animation-delay: 1.15s;
}

@-webkit-keyframes indeterminate {
    0% {
        left: -35%;
        right: 100%;
    }
    60% {
        left: 100%;
        right: -90%;
    }
    100% {
        left: 100%;
        right: -90%;
    }
}
@keyframes indeterminate {
    0% {
        left: -35%;
        right: 100%;
    }
    60% {
        left: 100%;
        right: -90%;
    }
    100% {
        left: 100%;
        right: -90%;
    }
}
@-webkit-keyframes indeterminate-short {
    0% {
        left: -200%;
        right: 100%;
    }
    60% {
        left: 107%;
        right: -8%;
    }
    100% {
        left: 107%;
        right: -8%;
    }
}
@keyframes indeterminate-short {
    0% {
        left: -200%;
        right: 100%;
    }
    60% {
        left: 107%;
        right: -8%;
    }
    100% {
        left: 107%;
        right: -8%;
    }
}

</style>

