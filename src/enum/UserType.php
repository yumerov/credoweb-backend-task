<?php

namespace Yumerov\CredowebBackendTask\Enum;

enum UserType: string {
  case PATIENT = 'patient';
  case DOCTOR = 'doctor';
}