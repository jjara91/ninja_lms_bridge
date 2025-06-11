<?php

arch()->preset()->php();
arch()->preset()->security();
arch()->preset()->strict();

arch('application cant be used in domain')
    ->expect('LMSBridge\*\Application')
    ->not->toBeUsedIn('LMSBridge\*\Domain');