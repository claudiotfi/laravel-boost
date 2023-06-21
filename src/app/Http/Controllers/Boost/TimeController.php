<?php

namespace App\Http\Controllers\Boost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{

    public function index(Request $request)
    {
        $times = Time::query()
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('message', 'LIKE', "%$request->search%")
            ->paginate(30);

        return view('boost.times.index', compact('times', 'request'));
    }

    public function create()
    {
        return view('boost.times.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'ini_segunda' => 'required',
            'fin_segunda' => 'required',
            'ini_terca' => 'required',
            'fin_terca' => 'required',
            'ini_quarta' => 'required',
            'fin_quarta' => 'required',
            'ini_quinta' => 'required',
            'fin_quinta' => 'required',
            'ini_sexta' => 'required',
            'fin_sexta' => 'required',
            'ini_sabado' => 'required',
            'fin_sabado' => 'required',
            'ini_domingo' => 'required',
            'fin_domingo' => 'required',
        ]);

        $time = new Time();
        $time->name = $request->input('name');
        $time->message = $request->input('message');
        $time->ini_segunda = $request->input('ini_segunda');
        $time->fin_segunda = $request->input('fin_segunda');
        $time->ini_terca = $request->input('ini_terca');
        $time->fin_terca = $request->input('fin_terca');
        $time->ini_quarta = $request->input('ini_quarta');
        $time->fin_quarta = $request->input('fin_quarta');
        $time->ini_quinta = $request->input('ini_quinta');
        $time->fin_quinta = $request->input('fin_quinta');
        $time->ini_sexta = $request->input('ini_sexta');
        $time->fin_sexta = $request->input('fin_sexta');
        $time->ini_sabado = $request->input('ini_sabado');
        $time->fin_sabado = $request->input('fin_sabado');
        $time->ini_domingo = $request->input('ini_domingo');
        $time->fin_domingo = $request->input('fin_domingo');
        $time->save();

        return redirect()->route('boost.times.index')->with('success', 'Horário adicionado com sucesso.');
    }


    public function edit($id)
    {
        $time = Time::findOrFail($id);
        return view('boost.times.edit', compact('time'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'ini_segunda' => 'required',
            'fin_segunda' => 'required',
            'ini_terca' => 'required',
            'fin_terca' => 'required',
            'ini_quarta' => 'required',
            'fin_quarta' => 'required',
            'ini_quinta' => 'required',
            'fin_quinta' => 'required',
            'ini_sexta' => 'required',
            'fin_sexta' => 'required',
            'ini_sabado' => 'required',
            'fin_sabado' => 'required',
            'ini_domingo' => 'required',
            'fin_domingo' => 'required',
        ]);

        $time = Time::findOrFail($id);
        $time->name = $request->input('name');
        $time->message = $request->input('message');
        $time->ini_segunda = $request->input('ini_segunda');
        $time->fin_segunda = $request->input('fin_segunda');
        $time->ini_terca = $request->input('ini_terca');
        $time->fin_terca = $request->input('fin_terca');
        $time->ini_quarta = $request->input('ini_quarta');
        $time->fin_quarta = $request->input('fin_quarta');
        $time->ini_quinta = $request->input('ini_quinta');
        $time->fin_quinta = $request->input('fin_quinta');
        $time->ini_sexta = $request->input('ini_sexta');
        $time->fin_sexta = $request->input('fin_sexta');
        $time->ini_sabado = $request->input('ini_sabado');
        $time->fin_sabado = $request->input('fin_sabado');
        $time->ini_domingo = $request->input('ini_domingo');
        $time->fin_domingo = $request->input('fin_domingo');
        $time->save();

        // Redirecione para a página de listagem dos horários (ou qualquer outra página que você desejar)
        return redirect()->route('boost.times.index')->with('success', 'Horário atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $time = Time::findOrFail($id);
        $time->delete();

        return redirect()->route('boost.times.index')->with('success', 'Horário removido com sucesso.');
    }
}
