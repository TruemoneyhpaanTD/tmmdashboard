<!--sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
   <div class="menu_section">
      <h3>{{ (Auth::check() && $user->employee_name ) ? $user->employee_name : "" }}</h3>
      <ul class="nav side-menu">
         <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
               <li><a href="/dashboard">Transaction Live</a></li>
               <li><a href="/dashboardHistory">Transaction History</a></li>
               <li><a href="/agent">Agent Report</a></li>
               <li><a href="/chart">Stock</a></li>
               <li><a href="/map">Map</a></li>
               <li><a href="/weeklySaleTransaction">Weekly Sale Transaction</a></li>
               <li><a href="/agentNetwork">Agent Networks</a></li>
               <li><a href="/dailySales">Daily Sales</a></li>
               <li><a href="/operatorsale">Operator Sale</a></li>
               <li><a href="/allcall">All Call</a></li>
               <li><a href="/eload">Eload</a></li>
               <li><a href="/remittance">Remittance & Bill Payment</a></li>
               <!-- <li><a href="/remittance">Remittance & Bill Payment</a></li> -->
               <!-- <li><a href="/test">Test This</a></li> -->
            
            </ul>
         </li>
         <!--<li><a><i class="fa fa-edit"></i> Agents <span class="fa fa-chevron-down"></span></a>
         
            <ul class="nav child_menu">
               <li><a href="/agent">Agent Transaction</a></li>
            </ul>
         </li>

         <li><a><i class="fa fa-sitemap"></i> Charts <span class="fa fa-chevron-down"></span></a>
         
            <ul class="nav child_menu">
               <li><a href="/chart">Chart List</a></li>
            </ul>

         </li> -->




           <!-- <li><a><i class="fa fa-users"></i> Call Center <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Topup<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a>Agent Topup<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                 <li><a href="/epin">Epin</a>
                                 <li><a href="/eload">ELoad</a>
                            </li>
                            </ul>
                            </li>
                            <li><a href="#">Topup History</a>
                            </li>
                            <li><a href="#">MEC Topup Pin Search</a>
                            </li>
                            <li><a href="#">MPT Topup Pin Search</a>
                            </li>
                            <li><a href="#">Telenor Topup Pin Search</a>
                            </li>
                            <li><a href="#">Ooredoo Topup Pin Search</a>
                            </li>
                            <li><a href="#">MEC</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
           </li>  -->




      </ul>
   </div>
</div>
<!-- /sidebar menu