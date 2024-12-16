<?php

namespace App\Policies;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransaksiPolicy
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
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pesanan $pesanan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(?User $user)
    {
        if (auth()->check()) {
            return $user->role == 'Konsumen'
                ? Response::allow()
                : Response::deny('Login sebagai customer untuk pemesanan', 403);
        } else {
            return Response::deny('Login terlebih dahulu untuk pemesanan', 401);
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pesanan $pesanan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pesanan $pesanan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pesanan $pesanan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pesanan $pesanan)
    {
        //
    }
}
