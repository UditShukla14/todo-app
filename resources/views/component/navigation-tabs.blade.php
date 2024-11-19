<div class="nav nav-tabs" style="margin-top: -4rem;">
   <a id="edit-tab" 
      class="nav-link {{ request()->segment(2) === 'edit' ? 'active' : '' }}" 
      href="{{ route('products.handleAction', ['action' => 'edit', 'product_id' => $product_id]) }}">
      Edit
   </a>
   
   <a id="hvac-tab" 
      class="nav-link {{ request()->segment(2) === 'hvac' ? 'active' : '' }}" 
      href="{{ route('products.handleAction', ['action' => 'hvac', 'product_id' => $product_id]) }}">
      HVAC
   </a>
</div>
