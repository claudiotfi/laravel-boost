<?php

namespace App\Http\Controllers\Boost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ip;

class IpController extends Controller
{
    public function index(Request $request)
    {
        $ips = Ip::query()
            ->where('ip', 'LIKE', "%$request->search%")
            ->orWhere('description', 'LIKE', "%$request->search%")
            ->paginate(30);

        return view('boost.ips.index', compact('ips', 'request'));
    }

    public function create()
    {
        return view('boost.ips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip' => 'required|ip|unique:allowed_ips'
        ]);

        Ip::create([
            'ip' => $request->ip
        ]);

        return redirect()->route('boost.ips.index')->with('success', 'IP permitido adicionado com sucesso.');
    }

    public function edit($id)
    {
        $ip = Ip::findOrFail($id);
        return view('boost.ips.edit', compact('ip'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'ip' => 'required|ip|unique:allowed_ips,ip,' . $id
        ]);

        $ip = Ip::findOrFail($id);
        $ip->ip = $request->input('ip');
        $ip->description = $request->input('description');
        $ip->save();

        return redirect()->route('boost.ips.index')->with('success', 'IP atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $ip = Ip::findOrFail($id);
        $ip->delete();

        return redirect()->route('boost.ips.index')->with('success', 'IP permitido removido com sucesso.');
    }
}
