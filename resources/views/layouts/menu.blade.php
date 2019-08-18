<li class="{{ Request::is('medicalFields*') ? 'active' : '' }}">
    <a href="{!! route('medicalFields.index') !!}"><i class="fa fa-edit"></i><span>Medical Fields</span></a>
</li>

<li class="{{ Request::is('medicalSpecialties*') ? 'active' : '' }}">
    <a href="{!! route('medicalSpecialties.index') !!}"><i class="fa fa-edit"></i><span>Medical Specialties</span></a>
</li>

<li class="{{ Request::is('emergencyServiceds*') ? 'active' : '' }}">
    <a href="{!! route('emergencyServiceds.index') !!}"><i class="fa fa-edit"></i><span>Emergency Serviceds</span></a>
</li>

<li class="{{ Request::is('emergencyServiceds*') ? 'active' : '' }}">
    <a href="{!! route('emergencyServiceds.index') !!}"><i class="fa fa-edit"></i><span>Emergency Serviceds</span></a>
</li>

