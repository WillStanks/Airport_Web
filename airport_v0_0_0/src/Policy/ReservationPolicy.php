<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Reservation;
use Authorization\IdentityInterface;

/**
 * Reservation policy
 */
class ReservationPolicy
{
    /**
     * Check if $user can create Reservation
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Reservation $reservation
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Reservation $reservation)
    {
        // All logged in users can create reservations.
        return true;
    }

    /**
     * Check if $user can update Reservation
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Reservation $reservation
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Reservation $reservation)
    {
        // logged in users can edit their own reservations.
        if ($user->confirmed == 0) {
            return False;
        } else {
            return $this->isAuthor($user, $reservation);
        }
    }

    /**
     * Check if $user can delete Reservation
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Reservation $reservation
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Reservation $reservation)
    {
        // logged in users can delete their own reservations.
        return $this->isAuthor($user, $reservation);
    }

    protected function isAuthor(IdentityInterface $user, Reservation $reservation)
    {
        return $reservation->user_id === $user->getIdentifier();
    }

    /**
     * Check if $user can view Reservation
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Reservation $reservation
     * @return bool
     */
    public function canView(IdentityInterface $user, Reservation $reservation)
    {
    }
}
