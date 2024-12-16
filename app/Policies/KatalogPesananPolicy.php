<?php

namespace App\Policies;

use App\Models\KatalogPesanan;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class KatalogPesananPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KatalogPesanan  $katalogPesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KatalogPesanan $katalogPesanan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KatalogPesanan  $katalogPesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, KatalogPesanan $katalogPesanan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KatalogPesanan  $katalogPesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, KatalogPesanan $katalogPesanan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KatalogPesanan  $katalogPesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, KatalogPesanan $katalogPesanan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KatalogPesanan  $katalogPesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, KatalogPesanan $katalogPesanan)
    {
        //
    }

    /**
     * otorisasi update pesanan dari pending ke proses
     */
    public function updatePesananProses(User $user, KatalogPesanan $pesanan)
    {
        if ($user->role == 'Barista' && $pesanan->status_pesanan_id == 1)
            return Response::allow();

        if ($user->role !== 'Barista' && $pesanan->status_pesanan_id == 1)
            return Response::deny('Hanya barista yang mempunyai otorisasi');

        if ($user->role == 'Barista' && $pesanan->status_pesanan_id !== 1)
            return Response::deny('Terjadi Kesalahan');

        if ($user->role !== 'Barista' && $pesanan->status_pesanan_id !== 1)
            return Response::deny('Terjadi Kesalahan');
    }

    /**
     * otorisasi update pesanan dari proses ke selesai
     */
    public function updatePesananSelesai(User $user, KatalogPesanan $pesanan)
    {
        if ($user->role == 'Barista' && $pesanan->status_pesanan_id == 2)
            return Response::allow();

        if ($user->role !== 'Barista' && $pesanan->status_pesanan_id == 2)
            return Response::deny('Hanya barista yang mempunyai otorisasi');

        if ($user->role == 'Barista' && $pesanan->status_pesanan_id !== 2)
            return Response::deny('Proses pesanan terlebih dahulu');

        if ($user->role !== 'Barista' && $pesanan->status_pesanan_id !== 2)
            return Response::deny('Terjadi Kesalahan');
    }
}
