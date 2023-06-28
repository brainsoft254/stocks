<template>
<div class="data-table-section table-responsive">
    <table class="table  table-compact row-border table-hover">
        <thead class="bg-blue">
            <tr >
                <th v-for="th in tableHeader" :key="th">
                    <div class="header-text">
                        <span>{{ th.text }}</span>
                        <span class="ps-2">
                            <i class="fa fa-sort" aria-hidden="true"></i>
                        </span>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(td, index) in tableData" :key="td" :class="['text-black',{'text-red':td.locked==0}]">
                <td class="text-center">{{ index + 1 }}</td>
                <td class="text-left">{{ td.invno }}</td>
                <td class="text-left">{{ td.invdate }}</td>
                <td class="text-left">{{ td.clcode }}</td>
                <td class="text-left no-wrap">{{ td.clname }}</td>
                <td class="text-left">{{ td.lpo }}</td>
                <td class="text-right">
                    <span class="label label-warning">{{
                        numberFormat(td.vat)
                    }}</span>
                </td>
                <td>
                    <span class="text-right label label-danger">{{
                        numberFormat(td.amount)
                    }}</span>
                </td>
                <td class="text-right">
                    <span class="text-right label label-success">{{
                        numberFormat(td.amount_paid)
                    }}</span>
                </td>
                <td class="text-right">
                    <span class="text-right label label-danger">{{
                        numberFormat(td.amount - td.amount_paid)
                    }}</span>
                </td>
                <td class="text-left">
                    <span
                        :class="[
                            'label',
                            {
                                'label-success': td.status > 0,
                                'label-danger': td.status < 1,
                            },
                        ]"
                        >{{ td.status ? "Posted" : "Unposted" }}</span
                    >
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button
                            type="button"
                            class="btn btn-primary dropdown-toggle btn-xs"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="text-blue" @click.prevent="printEvent(td.id)" id="viewLink" href="#" idd="{{td.id}}"
                                    ><i
                                        class="fa fa-print"
                                        aria-hidden="true"
                                    ></i>
                                    Print</a
                                >
                            </li>
                            <li v-if="!td.status" role="separator" class="divider"></li>

                            <li v-if="!td.status">
                                <a  class="text-blue"
                                    id="postLink"
                                    href="{{url('post-order')}}"
                                    idd="{{td.id}}"
                                    ><i
                                        class="fa fa-magic"
                                        aria-hidden="true"
                                    ></i>
                                    Post</a
                                >
                            </li>
                            <li v-if="!td.locked" role="separator" class="divider"></li>

                            <li v-if="!td.locked">
                                <input
                                    type="hidden"
                                    value="<?php echo csrf_token(); ?>"
                                    name="_token"
                                /><a
                                    class="text-primary"
                                    id="deleteLink"
                                    href="{{route('orders.destroy',td.id)}}"
                                    idd="{{td.id}}"
                                    ><i
                                        class="fa fa-trash-o"
                                        aria-hidden="true"
                                    ></i>
                                    Delete</a
                                >
                            </li>
                            
                            <li v-if="td.locked" role="separator" class="divider"></li>
                            <li v-if="td.locked">
                                <input
                                    type="hidden"
                                    value="<?php echo csrf_token(); ?>"
                                    name="_token"
                                /><a
                                    @click.prevent="unlockEvent(td.id)"
                                    class="text-blue"
                                    id="unlockLink"
                                    href="{{route('invoices.destroy',td.id)}}"
                                    idd="{{td.id}}"
                                    ><i
                                        class="fa fa-unlock"
                                        aria-hidden="true"
                                    ></i>
                                    Unlock</a
                                >
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>
<script>
import bootbox from 'bootbox';
// import swal from 'vue-sweetalert2';
export default {
    name: "TableBase",
    props: {
        columns: Array,
        entries: Array,
    },
    computed: {
        bal(amount, amount_paid) {
            return amount - amount_paid;
        },
        tableHeader() {
            return this.columns || [];
        },
        tableData() {
            return this.entries || [];
        },
    },
    methods: {
        numberFormat(number) {
            return new Intl.NumberFormat("en-US", {
                style: "decimal",
                minimumFractionDigits: 0,
            }).format(Math.trunc(number));
        },
        printEvent(invoiceid){
//            bootbox.alert('PRINT-ID='+invoiceid);
            axios.get(`/invoices/${invoiceid}`)
            .then((resp)=>{
               bootbox.dialog({
					title:'',
					message:resp.data,
					size:'large',
					backdrop:false,
				    onEscape:function(){},
				}).find("div.modal-dialog").addClass("largeWidth");
            })
            .catch((err)=>{
                console.log(err);
                bootbox.dialog({message:err.message});
            });
        },
        unlockEvent(invoiceid){
            console.log('UNLOCK ID',invoiceid);
			bootbox.confirm({ 
				size: "small",
				message: `Unlock Invoice Record ${invoiceid} ?`, 
				callback: function(result){
					/* result is a boolean; true = OK, false = Cancel*/
					if(result){
                        axios.post('/api/unlock-invoice',{id:invoiceid})
                        .then((resp)=>{
                            bootbox.alert(resp.data);
                            location.reload();
                        })
                        .catch((err)=>{
                            bootbox.alert(err.message)
                        })
					}else{
						bootbox.alert('You Shied !! ;)');
					}
				}
			});            
        },
        deleteEvent(invoiceid){
        }
    },
};
</script>
<style scoped>

    .header-text{
        display: flex;
        justify-content: left;
        align-items: center;
        align-content: space-between;
    }
    tbody>tr:last-child{
        border-bottom: solid 2px #000;
    }
    .data-table-section{
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        font-weight: 450;
        /* font-size:1px; */
    }
    /* .no-wrap{
        white-space: nowrap;
    } */
    
</style>
