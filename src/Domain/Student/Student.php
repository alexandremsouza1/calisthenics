<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use Alura\Calisthenics\Domain\Email\Email;
use DateTimeInterface;


class Student
{

    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private StudentName $fullName;
    private StudentAddress $address;

    public function __construct(Email $email, DateTimeInterface $birthDate, StudentName $fullName, StudentAddress $address)
    {
        $this->watchedVideos = new WatchedVideos();
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->fullName = $fullName;
    }


    public function fullName(): string
    {
        return (string) $this->fullName;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthday(): DateTimeInterface
    {
        return $this->birthDay;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }
        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        return $this->birthDay->diff(new \DateTimeImmutable())->y;
    }
}