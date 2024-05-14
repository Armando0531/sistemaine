<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Producto;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class NotificationComposer
{
    public function compose(View $view)
    {
        $productosVencidos = Producto::where('fecha_vencimiento', '<=', Carbon::now())->get();
        Log::info('Productos vencidos count: ' . $productosVencidos->count());
        $view->with('productosVencidos', $productosVencidos);
    }
}

