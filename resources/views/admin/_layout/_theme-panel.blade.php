<div class="theme-panel hidden-xs hidden-sm">
     <div class="toggler"> </div>
     <div class="toggler-close"> </div>
     <div class="theme-options">
         <div class="theme-option theme-colors clearfix">
             <span> THEME COLOR </span>
             <ul>
                 <li class="theme color-default tooltips {{ (Auth::user()->theme === 'default') ? 'current' : '' }}" data-style="default" data-container="body" data-original-title="Default"> </li>
                 <li class="theme color-darkblue tooltips {{ (Auth::user()->theme === 'darkblue') ? 'current' : '' }}" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                 <li class="theme color-blue tooltips {{ (Auth::user()->theme === 'blue' || Auth::user()->theme === '') ? 'current' : '' }}" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                 <li class="theme color-grey tooltips {{ (Auth::user()->theme === 'grey') ? 'current' : '' }}" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                 <li class="theme color-light tooltips {{ (Auth::user()->theme === 'light') ? 'current' : '' }}" data-style="light" data-container="body" data-original-title="Light"> </li>
                 <li class="theme color-light2 tooltips {{ (Auth::user()->theme === 'light2') ? 'current' : '' }}" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
             </ul>
         </div>
         <div class="theme-option">
             <span> Theme Style </span>
             <select class="layout-style-option form-control input-sm">
                 <option value="square" selected="selected">Square corners</option>
                 <option value="rounded">Rounded corners</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Layout </span>
             <select class="layout-option form-control input-sm">
                 <option value="fluid" selected="selected">Fluid</option>
                 <option value="boxed">Boxed</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Header </span>
             <select class="page-header-option form-control input-sm">
                 <option value="fixed" selected="selected">Fixed</option>
                 <option value="default">Default</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Top Menu Dropdown</span>
             <select class="page-header-top-dropdown-style-option form-control input-sm">
                 <option value="light" selected="selected">Light</option>
                 <option value="dark">Dark</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Sidebar Mode</span>
             <select class="sidebar-option form-control input-sm">
                 <option value="fixed">Fixed</option>
                 <option value="default" selected="selected">Default</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Sidebar Menu </span>
             <select class="sidebar-menu-option form-control input-sm">
                 <option value="accordion" selected="selected">Accordion</option>
                 <option value="hover">Hover</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Sidebar Style </span>
             <select class="sidebar-style-option form-control input-sm">
                 <option value="default" selected="selected">Default</option>
                 <option value="light">Light</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Sidebar Position </span>
             <select class="sidebar-pos-option form-control input-sm">
                 <option value="left" selected="selected">Left</option>
                 <option value="right">Right</option>
             </select>
         </div>
         <div class="theme-option">
             <span> Footer </span>
             <select class="page-footer-option form-control input-sm">
                 <option value="fixed">Fixed</option>
                 <option value="default" selected="selected">Default</option>
             </select>
         </div>
     </div>
 </div>