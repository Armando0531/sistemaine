<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        // Obtener todos los productos cuya fecha de vencimiento haya pasado
        $productosVencidos = Producto::where('fecha_vencimiento', '<', Carbon::today())->get();

        return view('partials.header.notifications', compact('productosVencidos'));
    }
}