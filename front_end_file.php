<?php

function func_wp_insert()
{
    //Add Vue.js
    wp_enqueue_script('wp_vuejs_n');
    //Add my code to it
    wp_enqueue_script('my_vuecode_n');


    wp_enqueue_style('wp_bulma_css_style');
    // wp_enqueue_style('wp_style_n');


    echo "<div id='wp_per_app'>"
        .'

        <p>Select any personalization type</p>
        <tabs>
            <tab name="Insert Text" :selected="true">
                <div>
                    Text (max. 40 characters per line)
                    <div class="field">
                        <div class="control">
                            <input id="one" v-model="row_one" class="input is-primary" type="text" name="row_one" placeholder="Row 1">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input v-model="row_two" class="input is-primary" type="text" name="" placeholder="Row 2">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input v-model="row_three" class="input is-primary" type="text" name="" placeholder="Row 3">
                        </div>
                    </div>

                    <modal v-if="showModal" @close="showModal=false">
                      {{ row_one }}
                      <br>
                      {{ row_two }}
                      <br>
                      {{ row_three }}
                      <img src="https://www.ic-myron.com/cf/HybrisProd/ConfigExpress/PreviewImageCalc/StreamView.cfm?comp=AU&qsn=K12009788&itemno=WF98803A&AreaPhyG=PBF&FontID=MYRONDR&logo=&impline1=.&impline2=&impline3=&AutoCalculateFontSizeForPreview=Y">
                    </modal>

                    <button @click="showModal=true">Preview</button>
                </div>
            </tab>

            <tab name="Insert Logo">
                <div>
                  Farbe/Methode: einfarbiger Aufdruck

                  <div class="file">
                    <input type="file" name="resume">
                  </div>

                  <h4><b class="has-text-centered">ODER</b></h4>

                  <p>
                    <h5>Später Senden - </h5>

                   Ihre Personalisierungswünsche können Sie nach Abschluss Ihrer Bestellung einreichen. Gerne können Sie uns Ihre Personalisierungswünsche und/oder Ihre Druckvorlage separat per E-Mail an logo@example.com senden. Bei Fragen hilft Ihnen unser Kundenservice gerne telefonisch unter 0681 99 25 450 weiter. Erst nach finaler Freigabe Ihrerseits wird Ihr Auftrag produziert.
                   </p>

                    <div class="field">
                       <label class="label" for="">Anmerkungen :</label>
                       <div class="control">
                           <textarea class="textarea is-primary" name="" placeholder=""></textarea>
                       </div>
                   </div>

                </div>
            </tab>

        </tabs>


    '
    .'<br>'
    .'<p id="pp">i am p</p>'
    .'</div>'; ?>
      <script type="text/javascript">
        var x = document.getElementById("myText").name;
        document.getElementById("pp").innerHTML = x;
      </script>
    <?php
}


add_action('woocommerce_before_add_to_cart_form', 'func_wp_insert');
