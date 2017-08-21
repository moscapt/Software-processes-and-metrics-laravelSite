@if(DB::table('stores')->where('user_id','=',Auth::user()->id)->pluck('id')==0)
	<li><a href="{{ URL::route('stores-page') }}">Criar Loja</a></li>	
@endif
<li><a href="{{ URL::route('list-products') }}">Produtos</a></li>
<li><a href="{{ URL::route('order-product') }}">Encomendar</a></li>