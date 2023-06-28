<template>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="text-default">
            <i class="fa fa-magic"></i>
            <strong>New Sales Order</strong>
          </h3>
        </div>
        <div class="panel-body">
          <form class="form-order" @submit.prevent="processOrder">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon success">Ref</span>
                    <input
                      v-model="orderno"
                      type="text"
                      name="refno"
                      @blur="isOrdernoUsed($event.target.value)"
                      class="form-control"
                      placeholder="Enter Sales Order No."
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon danger">VoucherNo#</span>
                    <input
                      v-model="ordermaster.voucherno"
                      type="text"
                      name="voucherno"
                      class="form-control"
                      placeholder="RCT Voucher No."
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon primary">Date</span>
                    <datepicker v-model="orderdate" name="trandate" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon warning">Location</span>
                    <select
                      v-model="ordermaster.stockloc"
                      class="form-control"
                      name="location"
                      id="location"
                    >
                      <option value="-1" selected="selected">--Select Location--</option>
                      <option
                        v-for="loc in locations"
                        :key="loc.id"
                        :value="loc.code"
                      >{{ loc.description }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon acct-label info">Client</span>
                    <!-- <select v-model="ordermaster.clcode"  class="form-control client" name="client" id="client" @change="getItems($event)">
										<option value="-1" selected="selected">--Select Client--</option>
										<option v-for="client in clients" :key="client.id" :value="client.code" >{{client.name}}</option>
                    </select>-->
                    <!-- <multi-select  placeholder="Select Client" v-model="ordermaster.clcode" @change="getItems($event)" class="form-control " :options="clOptions" :searchable="true"/>	 -->
                    
                    <Select2
                      v-model="ordermaster.clcode"
                      placeholder="select Client"
                      :options="clOptions"
                      :settings="{ theme: 'bootstrap' }"
                      @select="getItems($event)"
                      @change="getItems($event)"
                      id="clients"
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon acct-label info">Sales Discount</span>
                    <select
                      v-model="selectedDisc"
                      @change="
                        onDiscRateChange(
                          $event.target.value
                        )
                      "
                      class="form-control discount"
                      name="discount"
                      id="discount"
                    >
                      <option value="0" selected="selected">--None--</option>
                      <option
                        v-for="disc in discounts"
                        :key="disc.id"
                        :value="disc.rate"
                      >{{ disc.description }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row center-flex-items between-flex">
              <div class="col-md-8">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon primary">Remarks</span>
                    <textarea
                      v-model="ordermaster.remarks"
                      class="form-control"
                      name="remarks"
                      ref="remarks"
                      id="remarks"
                      rows="1"
                      style="resize: none"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <AutoSuggest
                  v-model="ordermaster.salesrep"
                  :items="salesreps"
                  :results="ordermaster.salesrep"
                  :label="replabel"
                  :placeholder="placeholder"
                  v-model:new-salesrep="new_salesrep"
                />
                <!-- <p :class="`btn btn-${cl_vatx?'success':'danger'} p-3 pull-right`">CLIENT PRICES VAT EXCl: <span class='badge  p-2'>{{cl_vatx?'YES':'NO'}}</span></p> -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table-items" style="width: 100%">
                  <thead class="bg-blue">
                    <tr>
                      <th>Code</th>
                      <th>Description</th>
                      <th>Uom</th>
                      <th class="text-center">Qty</th>
                      <th>U/Price</th>
                      <th>Vat?</th>
                      <th class="text-right">Vat</th>
                      <th class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody class="order-body" v-if="ordermaster.clcode != -1">
                    <!-- Line Item Begin -->
                    <tr
                      v-for="(
                                                orderitem, rid
                                            ) in orderitems"
                      :key="rid"
                      :ref="`tr`"
                      class="line-item"
                    >
                      <td>
                        <multi-select
                          v-model="orderitem.icode"
                          @change="
                            onCodeChange(
                              $event,
                              $event,
                              rid
                            )
                          "
                          class="form-control-grid select2-selection-grid"
                          :options="
                            items.map((item) => ({
                              value: item.code,
                              label: item.code,
                            }))
                          "
                          :searchable="true"
                        />
                      </td>
                      <td>
                        <multi-select
                          v-model="orderitem.idescr"
                          @change="
                            onDescrChange(
                              $event,
                              $event,
                              rid
                            )
                          "
                          class="form-control-grid select2-selection-grid"
                          :options="
                            items.map((item) => ({
                              value: item.description,
                              label: item.description,
                            }))
                          "
                          :searchable="true"
                        />
                        <!-- <itemcombo v-model='orderitem.qinstock' :ref="`qinstock`" :options="items.map(item=>({value:item.qty_instock,text:item.qty_instock}))" :showselectText=true style='display:none;border-radius:0px !important;'/> -->
                        <input
                          v-model="orderitem.qinstock"
                          type="number"
                          class="text-center form-control-grid itemqty col-xs-2"
                          style="
                                                        display: none;
                                                        border-radius: 0px !important;
                                                    "
                        />
                      </td>
                      <td>
                        <select
                          v-model="orderitem.iuom"
                          @change="
                            onUomChange(
                              rid,
                              $event.target.value
                            )
                          "
                          class="form-control-grid uom col-xs-4"
                          name="uom[]"
                          :id="`uom_${rid}`"
                          style="
                                                        border-radius: 0px !important ;
                                                        width: auto;
                                                    "
                        >
                          <option
                            v-for="unit in punits"
                            :key="unit.code"
                            :value="unit.code"
                          >{{ unit.description }}</option>
                        </select>
                      </td>
                      <td>
                        <input
                          v-model.number="
                            orderitem.iqty
                          "
                          @change="
                            onQtyChange(
                              $event,
                              $event.target.value,
                              rid
                            )
                          "
                          ref="iqty"
                          type="text"
                          name="qty[]"
                          :id="`qty_${rid}`"
                          class="text-center form-control-grid qty"
                        />
                      </td>
                      <td>
                        <input
                          v-model="orderitem.iprice"
                          :ref="`iprice`"
                          type="number"
                          name="price[]"
                          :id="`price_${rid}`"
                          class="form-control-grid price"
                          readonly
                        />
                      </td>
                      <td>
                        <itemcombo
                          v-model="orderitem.ihasVat"
                          @change="
                            onHasVatChange(
                              rid,
                              $event.target.value
                            )
                          "
                          :options="[
                            {
                              value: 1,
                              text: 'Yes',
                            },
                            {
                              value: 0,
                              text: 'No',
                            },
                          ]"
                          :showselectText="false"
                        />
                      </td>
                      <td>
                        <input
                          v-model="orderitem.ivatamnt"
                          :ref="`ivatamnt`"
                          type="number"
                          :id="`vat_${rid}`"
                          name="vat[]"
                          class="bg-warning text-right vat form-control-grid vat"
                          readonly
                        />
                      </td>
                      <td>
                        <input
                          v-model="orderitem.itotal"
                          :ref="`itotal`"
                          type="number"
                          :id="`total_${rid}`"
                          name="total[]"
                          class="text-right total form-control-grid"
                          readonly
                        />
                      </td>
                      <td>
                        <span
                          @click="removeRow(rid)"
                          class="removeLink btn btn-danger btn-xs"
                          :id="`remove_${rid}`"
                        >
                          <i class="fa fa-times"></i>
                        </span>
                      </td>
                    </tr>
                    <!-- End of Line Item -->
                  </tbody>
                </table>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-4">
                <a
                  href="#"
                  @click.prevent="addRow()"
                  class="btn btn-success pull-left"
                  id="btnAddItems"
                >
                  <i class="fa fa-cart-plus"></i> Add Row
                </a>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-4 form-group">
                    <div class="input-group">
                      <span class="input-group-addon info">Qty Total</span>
                      <input
                        v-model="ordermaster.totalqty"
                        type="text"
                        name="tqty"
                        class="tqty form-control text-right"
                        readonly
                      />
                    </div>
                  </div>
                  <div class="col-md-4 form-group">
                    <div class="input-group">
                      <span class="input-group-addon warning">Vat Total</span>
                      <input
                        v-model="ordermaster.totalvat"
                        type="number"
                        name="vattotal"
                        class="vattotal form-control text-right"
                        readonly
                      />
                    </div>
                  </div>
                  <div class="col-md-4 form-group">
                    <div class="input-group">
                      <span class="input-group-addon danger">Gross Total</span>
                      <input
                        v-model="ordermaster.grosstotal"
                        type="number"
                        name="grosstotal"
                        class="grosstotal form-control text-right"
                        readonly
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="input-group">
                      <span class="input-group-addon danger">VAT RATE (%)</span>
                      <input
                        type="number"
                        name="vatrate"
                        class="vatrate form-control text-right"
                        :value="vatrate"
                        readonly
                      />
                    </div>
                  </div>
                  <div
                    class="col-md-7 form-group {{ $errors->has('totaldisc') ? ' has-error' : '' }}"
                  >
                    <div class="input-group">
                      <span class="input-group-addon success">Discount Total</span>
                      <input
                        v-model="ordermaster.disctotal"
                        type="text"
                        name="totaldisc"
                        class="totaldisc form-control text-right"
                        readonly
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" @click="processOrder">
                  <i class="fa fa-floppy-o"></i> Save/Update
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="panel-footer">

          <div class="row">
<!--            <div class="col-md-6">-->
<!--              <pre>{{ $data.orderitems }}</pre>-->
<!--            </div>-->
           <!-- <div class="col-md-6"> -->
             <!-- <pre>{{ $data.ordermaster }}</pre> -->
          <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from "vue3-datepicker";
import Itemcombo from "./Itemcombo.vue";
import moment from "moment";
import AutoSuggest from "../AutoSuggest.vue";
import {apiClient} from '../../services/API.js';

export default {
  components: {
    Datepicker,
    Itemcombo,
    AutoSuggest,
  },
  data: function () {
    return {

      orderdate: new Date(),
      timezone: "Europe/Moscow",
      clients: null,
      user: window.laravel,
      clOptions: null,
      discounts: null,
      locations: null,
      punits: null,
      vatrate: 0,
      selectedDisc: 0,
      orderno: "",
      orderexists: false,
      items: [],
      salesreps: [],
      cl_vatx: 0,
      rowid: null,
      itemcode: null,
      itemdescr: null,
      replabel: "Sales Rep",
      placeholder: "Enter SalesRep Name",
      new_salesrep: false,
      repoptions: [
        "Apple",
        "Banana",
        "Orange",
        "Mango",
        "Pear",
        "Peach",
        "Grape",
        "Tangerine",
        "Pineapple",
        "Njuguna Mwaura",
      ],

      ordermaster: {
          refno: "",
        trandate: moment().format("YYYY-MM-DD"),
        clcode: "-1",
        stockloc: "JD002",
        salesrep: "",
        voucherno:"",
        remarks: "",
        discrate: 0,
        totalqty: 0,
        totalvat: 0,
        grosstotal: 0,
        disctotal: 0,
        staff: window.laravel.user.email,
        staffname: window.laravel.user.name,
      },
      orderitems: [
        {
          icode: "",
          idescr: "",
          iuom: "unit",
          ifactor: 1,
          qinstock: 0,
          iqty: 0,
          iprice: "",
          ihasVat: 1,
          ivatamnt: 0,
          itotal: 0,
        },
      ],
    };
  },

  mounted() {

   apiClient.get("/api/initdata")
      .then((res) => {
        this.clients = res.data.clients;
        this.discounts = res.data.discounts;
        this.locations = res.data.locations;
        this.punits = res.data.units;
        this.vatrate = res.data.vatrate;
        this.items = res.data.items;
        this.salesreps = res.data.salesreps;
        this.clOptions = this.clients.map((item) => ({
          id: item.code,
          text: item.name,
        }));
        //   this.clOptions=this.clients.map(item=>({value:item.code,label:item.name}));
        //console.log(this.clOptions);
      })
      .catch((err) => {
        console.log(err.response.data);
      });

    apiClient
      .get("/api/get-reps")
      .then((res) => {
        this.salesreps = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
  },
  created() {
    console.log("CONFIG", this.$apiUrli);
  },
  computed: {
    // itemDescr(){
    // 	if(this.itemcode==''){return 'hakuna Kitu ka Hiyo';}
    // 	return this.items.filter(item=> item.code==this.itemcode).description;
    // }
  },
  watch: {
    new_salesrep(val) {
      this.createNewSalesrep(val);
    },
    orderdate(date) {
      let d = new Date(
        Date.UTC(
          date.getFullYear(),
          date.getMonth(),
          date.getDate(),
          date.getHours(),
          date.getMinutes(),
          date.getSeconds()
        )
      );
      this.ordermaster.trandate = moment(d).format("YYYY-MM-DD");
    },
    orderno() {
      console.log("ORN=", this.orderno);
      this.ordermaster.refno = this.orderno;
      //this.isOrdernoUsed(this.orderno);
    },
    itemcode(newVal, oldVal) {
      console.log("NEW", newVal);
      console.log("oldVal", oldVal);
      this.itemExists(newVal,this.rowid,'code');

      if (newVal!=null){
      this.getItemDescr(this.itemcode);
      this.getItemQty();
      this.getRowTotal(this.rowid);
      }else{
        this.orderitems[this.rowid].icode="";
      }
    },
    itemdescr(newVal, oldVal) {
      console.log("NEW", newVal);
      console.log("oldVal", oldVal);
      this.itemExists(newVal,this.rowid,'descr');

      if (newVal!=null){
        this.getItemCode(this.itemdescr);
        this.getItemQty();
        this.getRowTotal(this.rowid);
      }else{
        this.orderitems[this.rowid].idescr="";
      }

    },
  },
  methods: {


    createNewSalesrep(repname) {
      this.$swal(
        "Confirm",
        `Create Sales Rep Record\n(${repname}) ?`,
        "question"
      ).then((res) => {
        if (res.value) {
          apiClient
            .post("/api/add-salesrep", {
              name: repname,
            })
            .then((res) => {
              //console.log(res.data);
              this.salesreps.push(repname);
            })
            .catch((err) => {
              console.log(err.response.data);
            });
        } else {
          this.$swal("....", "You Shied..", "info");
        }
      });
    },
    processOrder() {
      if (!this.isOrdernoUsed(this.ordermaster.refno)) {
        if (this.ordermaster.refno == "") {
          this.$swal(
            "refno Missing",
            "Enter refno/Refno & Try Again !",
            "warning"
          );
          return;
        }
        if (this.ordermaster.salesrep.trim() == "") {
          this.$swal(
            "Sales Rep Missing",
            "Enter Rep name & Try Again !",
            "warning"
          );
          return;
        }
        if (
          this.ordermaster.clcode == -1 ||
          this.ordermaster.clcode == ""
        ) {
          this.$swal(
            "Client Missing",
            "Select Client & Try Again !",
            "warning"
          );
          return;
        }
        if (this.ordermaster.remarks.trim() == "") {
          this.$swal(
            "Remarks Missing",
            "Enter Some Remarks & Try Again !",
            "warning"
          ).then((value) => {
            if (value) {
              this.$refs.remarks.focus();
            }
          });
          return;
        }
        if (this.ordermaster.grosstotal == 0) {
          this.$swal(
            "Zero Value Order Rejected",
            "Check Order Totals & Try Again !",
            "danger"
          );
          return;
        }
        let orderForm = {
          master: this.ordermaster,
          details: this.orderitems,
        };
        this.$swal("Confirm", "Create Client Order ?", "question").then(
          (res) => {
            if (res.value) {
              apiClient
                .post("/api/process-order", {
                  master: this.ordermaster,
                  details: this.orderitems,
                })
                .then((res) => {
                  this.$swal(
                    "Success",
                    res.data,
                    "info"
                  ).then((res) => {
                    if (res.value) {
                      location.reload();
                    }
                  });
                })
                .catch((err) => {
                  console.log(err.response.data);
                });
            } else {
              this.$swal("....", "You Shied..", "info");
            }
          }
        );
      } else {
        this.$swal(
          "Duplicate Orders <b>NOT</b> Allowed",
          "Order No Used before !!\n\rEdit Order Details Instead ;)",
          "warning"
        );
        return;
      }
    },
    getItems(event) {
      console.log(event.id);
      if (this.ordermaster.stockloc == -1) {
        this.$swal(
          "Stock Location Not Selected",
          "Select Stock Location & Try Again",
          "warning"
        );
        this.ordermaster.clcode = -1;
        return;
      }
      this.orderitems = [];
      this.ordermaster.clcode = event.id;
      apiClient
        .post(
          "/api/items",
          {
            clientcode: this.ordermaster.clcode,
            location: this.ordermaster.stockloc,
          },
          {
            headers: {
              "Content-Type": "application/json",
            },
          }
        )
        .then((res) => {
          this.items = res.data.clItems;
          this.cl_vatx = res.data.vatx;
          console.log("ITEMZ", this.items);
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getItemQty() {
      apiClient
        .post("/api/itemqty", {
          icode: this.itemcode,
          location: this.ordermaster.stockloc,
        })
        .then((res) => {
          this.orderitems[this.rowid].qinstock = res.data;
          console.log("ITQ", res.data);
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    isOrdernoUsed(vorderno) {
      apiClient
        .post("/api/order-exists", { refno: vorderno })
        .then((res) => {
          console.log(res);
          this.orderexists = res.data > 0;
          if (this.orderexists) {
            this.$swal(
              "Order Exists",
              "Order No Used Before !\r\nCheck & Try Again",
              "warning"
            );
          }
          return true;
        })
        .catch((err) => {
          console.log(err.response.data);
        });
      return false;
    },



    getRowTotal(rowid) {
      let vatRate = isNaN(parseFloat(this.vatrate))
        ? 0
        : parseFloat(this.vatrate);
      let tvrate = parseFloat(vatRate) + 100; //vat rate plus 100
      let dvrate = parseFloat(vatRate) / 100; //vat rate divided by 100

      let qty = isNaN(parseInt(this.orderitems[rowid].iqty))
        ? 0
        : parseInt(this.orderitems[rowid].iqty);
      let uprice = isNaN(parseFloat(this.orderitems[rowid].iprice))
        ? 0
        : parseFloat(this.orderitems[rowid].iprice);
      let hasvat = parseInt(this.orderitems[rowid].ihasVat);
      let factor = isNaN(parseInt(this.orderitems[rowid].ifactor))
        ? 0
        : parseInt(this.orderitems[rowid].ifactor);

      //Vat Calculation
      let rvat = this.cl_vatx
        ? hasvat == 1
          ? factor * qty * uprice * dvrate
          : 0
        : hasvat
          ? (factor * qty * uprice * vatRate) / tvrate
          : 0;
      let rtotal = factor * qty * uprice;

      this.orderitems[rowid].ivatamnt = rvat.toFixed(2);
      this.orderitems[rowid].itotal = rtotal.toFixed(2);

      this.calculateColumnTotal();
    },
    calculateColumnTotal() {
      let colTotal = 0,
        colVat = 0,
        colQty = 0;

      this.orderitems.forEach((item) => {
        //Sum up total amount
        let col_value = isNaN(
          item.itotal.toString().replace(/\,/g, "") || 0
        )
          ? 0
          : item.itotal.toString().replace(/\,/g, "") || 0;
        colTotal += parseFloat(col_value);

        //sum Vat Amnt
        let vat_value = isNaN(
          item.ivatamnt.toString().replace(/\,/g, "") || 0
        )
          ? 0
          : item.ivatamnt.toString().replace(/\,/g, "") || 0;
        colVat += parseFloat(vat_value);

        //Sum Qty
        let qty_value = isNaN(
          item.iqty.toString().replace(/\,/g, "") || 0
        )
          ? 0
          : item.iqty.toString().replace(/\,/g, "") || 0;
        colQty += parseInt(qty_value);
      });

      this.ordermaster.totalqty = colQty.toFixed(0);
      this.ordermaster.totalvat = colVat.toFixed(2);
      this.ordermaster.grosstotal = colTotal.toFixed(2);

      this.calculateOrderDisc();
    },
    calculateOrderDisc() {
      let discValue = 0;
      let grossTotal = isNaN(parseFloat(this.ordermaster.grosstotal) || 0)
        ? 0
        : parseFloat(this.ordermaster.grosstotal);
      let vatTotal = isNaN(parseFloat(this.ordermaster.totalvat) || 0)
        ? 0
        : parseFloat(this.ordermaster.totalvat);
      let discRate = isNaN(parseFloat(this.selectedDisc) * 0.01 || 0)
        ? 0
        : parseFloat(this.selectedDisc) * 0.01;

      discValue = this.cl_vatx
        ? grossTotal * discRate
        : (grossTotal - vatTotal) * discRate;

      this.ordermaster.disctotal = isNaN(discValue.toFixed(2))
        ? 0
        : discValue.toFixed(2);
    },
    getItemDescr(icode) {
      if (this.itemcode == "-1" || this.itemcode == null) {
        this.itemdescr == "-1";
        this.itemcode == "-1";
        this.orderitems[this.rowid].icode = "";
        this.orderitems[this.rowid].iprice = "";
        return;
      }

      var fitem = this.items.filter(function (item) {
        return item.code == icode;
      })[0];
      this.orderitems[this.rowid].idescr = fitem.description;
      this.orderitems[this.rowid].iprice = fitem.sprice;
    },
    getItemCode(idescr) {
      if (this.itemdescr == "-1" || this.itemdescr == null) {
        this.itemdescr == "-1";
        this.itemcode == "-1";
        this.orderitems[this.rowid].icode = "";
        this.orderitems[this.rowid].iprice = "";
        return;
      }
      var fitem = this.items.filter(function (item) {
        return item.description == idescr;
      })[0];
      this.itemcode = fitem.code;
      // console.log(this.itemcode);
      this.orderitems[this.rowid].icode = fitem.code;
      this.orderitems[this.rowid].iprice = fitem.sprice;
    },
    onCodeChange(event, selItem, rowID) {
      console.log("xxxx");
      if (this.itemExists(selItem)) {
        this.$swal(
          "Duplicate Item Detected",
          "Duplicate Items <b>NOT</b> Allowed !",
          "info"
        );
        this.orderitems[rowID].icode = "";
        return;
      } else {
        this.itemcode = selItem;
        this.rowid = rowID;
      }
    },
    onDescrChange(event, selDescr, rowID) {
      this.itemdescr = selDescr;
      this.rowid = rowID;
    },
    itemExists(v_item,rowid,coltype) {
      if(v_item!=null){
        let selectedItem=this.getOrderItem(v_item,coltype);
        console.log(selectedItem);
        if(selectedItem.length>1){
          this.$swal("DUPLICATE ITEM","Duplicates NOT ALLOWED","error").then((resp)=>{
            if(resp.value){
              this.orderitems.splice(rowid,1);
            }
          });
        }
      }
    },
    getOrderItem(query,coltype='code'){
      if (query!=null){
        console.log("ITEM-IQ",query);
        if (coltype=='code'){
        return this.orderitems.filter((item)=>{
         return item.icode.toLowerCase()===query.toLowerCase();
         //return item.icode.toLowerCase().indexOf(query.toLowerCase()) !== -1;
        });
        }else{
          return this.orderitems.filter((item)=>{
            return item.idescr.toLowerCase()===query.toLowerCase();
            //return item.idescr.toLowerCase().indexOf(query.toLowerCase()) !== -1;
          });
        }
      }
    },
    onQtyChange($event, vQty, rowid) {
      var stockqty = this.orderitems[rowid].qinstock;
      //console.log(stockqty, vQty);
      // if (vQty > stockqty) {
      //   this.$swal(
      //     `Insufficient Qtys in stock\n\r Available units: { ${stockqty} } `,
      //     "Check Qty Entered & Try Again",
      //     "warning"
      //   );
      //   this.orderitems[rowid].iqty = stockqty;
      //   this.getRowTotal(rowid);
      //   return;
      // }
      this.getRowTotal(rowid);
    },
    onHasVatChange(rowid, value) {
      this.orderitems[rowid].ihasVat = value;
      this.getRowTotal(rowid);
    },
    onUomChange(rowid, uom) {
      this.orderitems[rowid].ifactor = this.punits.filter(
        (unit) => unit.code == uom
      )[0].factor;
      this.getRowTotal(rowid);
    },
    onDiscRateChange(discRate) {
      if (this.ordermaster.clcode == -1) {
        this.$swal(
          "Client Not Selected",
          "Select Client & Try Again ;)",
          "warning"
        );
        this.selectedDisc = 0;
        return;
      }
      this.selectedDisc = discRate;
      this.ordermaster.discrate = discRate;
      console.log(this.selectedDisc);
      this.calculateColumnTotal();
      this.calculateOrderDisc();
    },
    onTrandateChange(date) {
      console.log(date);
    },
    addRow() {
      if (this.ordermaster.clcode == "-1") {
        this.$swal(
          "Client Not Selected",
          "Select Client & Try Again",
          "warning"
        );
        return;
      }
      if (this.ordermaster.stockloc == "-1") {
        this.$swal(
          "Location Not Selected",
          "Select Location & Try Again",
          "warning"
        );
        return;
      }
      this.orderitems.push({
        icode: "",
        idescr: "",
        iuom: "unit",
        ifactor: 1,
        qinstock: 1,
        iqty: 0,
        iprice: 0,
        ihasVat: 1,
        ivatamnt: 0,
        itotal: 0,
      });
    },
    removeRow(index) {
      this.orderitems.splice(index, 1);
      this.calculateColumnTotal();
      if (index === 0) this.addRow();
    },
  },
};
</script>
<style scoped>
.multiselect {
  width: 230px !important;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 400;
  font-size: 14px !important;
  word-wrap: inherit;
}
.multiselect-option {
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 400;
  font-size: 14px !important;
}
</style>
