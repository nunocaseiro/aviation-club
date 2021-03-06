<?php

namespace App\Policies;

use App\User;
use App\Movimento;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovimentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the movimento.
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function view(User $user, Movimento $movimento)
    {
        //
    }

    /**
     * Determine whether the user can create movimentos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the movimento.
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function update(User $user, Movimento $movimento)
    {

        return ($user->isDirecao() || ($movimento->piloto_id==$user->id || $movimento->instrutor_id==$user->id)) && $user->hasVerifiedEmail() && $user->isAtivo() && $user->password_inicial==0;

    }



    /**
     * Determine whether the user can delete the movimento.
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function delete(User $user, Movimento $movimento)
    {
        //
    }

    /**
     * Determine whether the user can restore the movimento.
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function restore(User $user, Movimento $movimento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the movimento.
     *
     * @param  \App\User  $user
     * @param  \App\Movimento  $movimento
     * @return mixed
     */
    public function forceDelete(User $user, Movimento $movimento)
    {
        //
    }
}
