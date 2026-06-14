<?php
/**
 * Spells page (static dataset embedded)
 * - Organizado por filtros (vocation/type/search)
 * - Não lê de arquivo externo
 */
?>

<div style="max-width:800px;margin:0 auto 8px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
  <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
    <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> SPELLS <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
  </h1>
</div>

<?php
// XML embutido (baseado em spells.xml) — removemos as magias de monstros na renderização
$embeddedXml = <<<'XML'
<?xml version="1.0"?>
<spells>
	<!-- Rune Spells -->
	<rune name="adevo grav pox" id="2285" allowfaruse="1" maglv="0" exhaustion="2000" blocktype="solid" charges="3" script="runes/poison_field_rune.lua"/>
	<rune name="adura gran" id="2265"  allowfaruse="1" maglv="1" exhaustion="1000"  needtarget="1" aggressive="0" charges="1" script="runes/intense_healing_rune.lua" />
	<rune name="adana pox" id="2266" allowfaruse="1" needtarget="1" aggressive="0" charges="1" script="runes/antidote_rune.lua" />
	<rune name="adori" id="2287" allowfaruse="1" exhaustion="2000"  needtarget="1" charges="5" script="runes/light_magic_missile_rune.lua" />
	<rune name="adevo grav flam" id="2301" allowfaruse="1" exhaustion="2000" maglv="1" blocktype="solid" charges="3" script="runes/fire_field_rune.lua" />
	<rune name="adeta sio" id="2290" allowfaruse="1" maglv="5" exhaustion="2000" needtarget="1" charges="1" script="runes/convince_creature_rune.lua" /> 
	<rune name="adito grav" id="2261" allowfaruse="1" maglv="3" exhaustion="2000" range="4" blocktype="solid" aggressive="0" charges="3" script="runes/destroy_field_rune.lua" />
	<rune name="adevo grav vis" id="2277" allowfaruse="1" maglv="3" exhaustion="2000" blocktype="solid" charges="3" script="runes/energy_field_rune.lua" />
	<rune name="adito tera" id="2310" allowfaruse="1" maglv="4" exhaustion="2000" charges="3" range="1" script="runes/desintegrate_rune.lua" />
	<rune name="adura vita" id="6675" allowfaruse="1" maglv="4" exhaustion="1000" needtarget="1" aggressive="0" charges="1" script="runes/ultimate_healing_rune.lua" />
	<rune name="adori gran" id="2311" allowfaruse="1" maglv="3" exhaustion="1000" needtarget="1" charges="5" script="runes/heavy_magic_missile_rune.lua"/>
	<rune name="adevo mas pox" id="2286" allowfaruse="1" maglv="4" exhaustion="2000" blocktype="solid" charges="2" script="runes/poison_bomb_rune.lua" />
	<rune name="adevo mas flam" id="2305" allowfaruse="1" maglv="5" exhaustion="2000" blocktype="solid" charges="2" script="runes/fire_bomb_rune.lua" />
	<rune name="adevo res flam" id="2308" allowfaruse="1" maglv="7" exhaustion="2000" needtarget="1" charges="2" script="runes/soulfire_rune.lua" />
	<rune name="adevo ina" id="2291" allowfaruse="1" maglv="4" exhaustion="2000" selftarget="1" blocktype="solid" charges="1" script="runes/chameleon_rune.lua" />
	<rune name="adori flam" id="2302" allowfaruse="1" maglv="4" exhaustion="2000" charges="3" script="runes/fireball_rune.lua" />
	<rune name="adana mort" id="2316" allowfaruse="1" maglv="4" exhaustion="2000" blocktype="solid" charges="2" script="runes/animate_dead_rune.lua" />
	<rune name="adevo mas grav pox" id="2289" allowfaruse="1" maglv="5" exhaustion="2000" blocktype="solid" charges="4" script="runes/poison_wall_rune.lua" />
	<rune name="adori gran flam" id="2304" allowfaruse="1" maglv="4" exhaustion="1000" charges="2" script="runes/great_fireball_rune.lua" />
	<rune name="adori gran frigo" id="2274" allowfaruse="1" maglv="4" exhaustion="1000" charges="2" script="runes/great_frigoball_rune.lua" />
	<rune name="adori gran vis" id="2315" allowfaruse="1" maglv="4" exhaustion="1000" charges="2" script="runes/thunderstorm_rune.lua" />
	<rune name="adori gran pox" id="6672" allowfaruse="1" maglv="4" exhaustion="1000" charges="2" script="runes/earthball_rune.lua" />
	<rune name="adevo mas hur" id="2313" allowfaruse="1" maglv="6" exhaustion="1000" charges="3" script="runes/explosion_rune.lua" />
	<rune name="adevo grav tera" id="2293" allowfaruse="1" maglv="9" exhaustion="2000" blocktype="all" charges="3" script="runes/magic_wall_rune.lua" />
	<rune name="exevo grav tera" id="2269" allowfaruse="1" maglv="9" exhaustion="2000" blocktype="all" charges="3" script="runes/wild_growth_rune.lua" />
	<rune name="adevo mas grav flam" id="2303" allowfaruse="1" maglv="6" exhaustion="2000" blocktype="solid" charges="4" script="runes/fire_wall_rune.lua" />
	<rune name="adevo mas vis" id="2262" allowfaruse="1" maglv="10" exhaustion="2000" blocktype="solid" charges="2" script="runes/energy_bomb_rune.lua" />
	<rune name="adevo mas grav vis" id="2279" allowfaruse="1" maglv="9" exhaustion="2000" blocktype="solid" charges="4" script="runes/energy_wall_rune.lua" />
	<rune name="adori vita vis" id="2268" allowfaruse="1" maglv="15" exhaustion="1200" needtarget="1" charges="1" script="runes/sudden_death_rune.lua" />
	<rune name="adevo res pox" id="2292" allowfaruse="1" maglv="4" exhaustion="2000" needtarget="1" charges="3" script="runes/envenom_rune.lua" />
	<rune name="adori san" id="2295" allowfaruse="1" maglv="3" needtarget="1" charges="5" script="runes/holly_magic_missile_rune.lua"/>
	<rune name="adana ani" id="2278" allowfaruse="1" maglv="18" exhaustion="2000" needtarget="1" mana="900" charges="1" script="runes/paralyze_rune.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</rune>

	<!-- House Spells -->
	<instant name="House Guest List" words="aleta sio" aggressive="0" script="house/edit_guest_list.lua" />
	<instant name="House Subowner List" words="aleta som" aggressive="0" script="house/edit_subowner_list.lua" />
	<instant name="House Door List" words="aleta grav" casterTargetOrDirection="1" aggressive="0" script="house/edit_door_list.lua" />
	<instant name="House Kick" words="alana sio" aggressive="0" playernameparam="1" params="1" script="house/kick.lua" />

	<!-- Instant Spells (players) -->
	<instant name="Light" words="utevo lux" needlearn="0" maglv="0" mana="20" selftarget="1" aggressive="0" script="support/light.lua"/>
	<instant name="Find Person" words="exiva" needlearn="0" maglv="0" mana="20" params="1" aggressive="0" script="support/find_person.lua"/>
	<instant name="Magic Rope" words="exani tera" needlearn="0" maglv="1" mana="20" aggressive="0" script="support/magic_rope.lua"/>
	<instant name="Light Healing" words="exura" needlearn="0" maglv="1" mana="25" selftarget="1" aggressive="0" script="healing/light_healing.lua"/>
	<instant name="Antidote" words="exana pox" needlearn="0" maglv="1" mana="30" selftarget="1" aggressive="0" script="healing/cure_poison.lua"/>
	<instant name="Intense Healing" words="exura gran" needlearn="0" maglv="3" mana="40" selftarget="1" aggressive="0" script="healing/intense_healing.lua">
		<vocation name="None"/>
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant name="Levitate" words="exani hur" needlearn="0" maglv="1" prem="0" mana="50" params="1" script="support/levitate.lua"/>
	<instant name="Energy Strike" words="exori vis" maglv="3" mana="25" range="3" casterTargetOrDirection="1" exhaustion="2000" script="attack/energy_strike.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Summon Creature" words="utevo res" needlearn="0" maglv="16" params="1" script="support/summon_creature.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Great Light" words="utevo gran lux" needlearn="0" maglv="3" mana="60" selftarget="1" aggressive="0" script="support/great_light.lua"/>
	<instant name="Magic Shield" words="utamo vita" maglv="4" mana="50" selftarget="1" aggressive="0" script="support/magic_shield.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant group="attack" spellid="62" name="Annihilation" words="exori gran ico" lvl="500" mana="350" prem="1" range="1" needtarget="1" blockwalls="1" needweapon="1" exhaustion="2000" groupcooldown="2000" needlearn="0" script="attack/annihilation.lua">
		<vocation name="Knight" />
		<vocation name="Elite Knight" />
	</instant>
	<instant name="Haste" words="utani hur" needlearn="0" maglv="4" prem="0" mana="60" selftarget="1" aggressive="0" script="support/haste.lua" />
	<instant name="Flame Strike" words="exori flam" maglv="3" prem="0" mana="25" range="3" casterTargetOrDirection="1" exhaustion="2000" script="attack/flame_strike.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="None"/>
	</instant>
	<instant name="Death Strike" words="exori mort" needlearn="0" maglv="2" prem="0" mana="25" range="3" casterTargetOrDirection="1" exhaustion="2000" script="attack/force_strike.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Ice Strike" words="exori frigo" needlearn="0" maglv="4" prem="0" mana="25" range="3" casterTargetOrDirection="1" exhaustion="2000" script="attack/frigo_strike.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Fire Wave" words="exevo flam hur" needlearn="0" maglv="7" mana="80" direction="1" script="attack/fire_wave.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant name="Heal Friend" words="exura sio" needlearn="0" maglv="7" mana="70" prem="0" needtarget="1" params="1" aggressive="0" blockwalls="1" script="healing/heal_friend.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Ultimate Healing" words="exura vita" needlearn="0" maglv="8" mana="80" selftarget="1" aggressive="0" script="healing/ultimate_healing.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant name="Strong Haste" words="utani gran hur" needlearn="0" maglv="8" prem="0" mana="100" selftarget="1" aggressive="0" script="support/strong_haste.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Charge" words="utani tempo hur" needlearn="0" maglv="7" prem="0" mana="150" selftarget="1" aggressive="0" script="support/charge.lua">
		<vocation name="Elite Knight"/>
		<vocation name="Royal Paladin" />
	</instant>
	<instant name="Challenge" words="exeta res" needlearn="0" maglv="4" prem="0" mana="30" selftarget="1" script="support/challenge.lua">
		<vocation name="Elite Knight"/>
	</instant>
	<instant name="Challenge" words="exeta res max" needlearn="0" maglv="4" prem="0" mana="100" selftarget="1" script="support/challengemax.lua">
		<vocation name="Elite Knight"/>
	</instant>
	<instant name="Energy Beam" words="exevo vis lux" needlearn="0" maglv="10" mana="100" direction="1" script="attack/energy_beam.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant name="Creature Illusion" words="utevo res ina" needlearn="0" maglv="10" mana="100" params="1" script="support/creature_illusion.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Cancel Invisibility" words="exana ina" needlearn="0" maglv="12" prem="0" mana="200" selftarget="1" script="support/cancel_invisibility.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant name="Ultimate Light" words="utevo vis lux" needlearn="0" maglv="12" mana="140" aggressive="0" selftarget="1" script="support/ultimate_light.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Knight"/>
		<vocation name="Elite Knight"/>
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" name="Holy Missile Rune" words="adori holy" maglv="3" mana="90" soul="3" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/holly_magic_missile_rune.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant name="Great Energy Beam" words="exevo gran vis lux" needlearn="0" maglv="14" mana="200" direction="1" script="attack/great_energy_beam.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant name="Berserk" words="exori" needlearn="0" maglv="5" mana="200" selftarget="1" script="attack/berserk.lua">
		<vocation name="Knight"/>
		<vocation name="Elite Knight"/>
	</instant>
	<instant name="Berserk Max" words="exori gran" needlearn="0" maglv="8" mana="300" selftarget="1" script="attack/exori_gran.lua">
		<vocation name="Knight"/>
		<vocation name="Elite Knight"/>
	</instant>
	<instant name="Groundshaker" words="exori mas" needlearn="0" maglv="7" mana="380" selftarget="1" script="attack/exorimas.lua">
		<vocation name="Knight"/>
		<vocation name="Elite Knight"/>
	</instant>
	<instant group="attack" name="Whirlwind Throw" words="exori hur" lvl="28" mana="40" prem="0" range="5" needtarget="1" blockwalls="1" needweapon="1" exhaustion="3000" groupcooldown="2000" needlearn="0" script="attack/whirlwind throw.lua">
		<vocation name="Knight" />
		<vocation name="Elite Knight" />
	</instant>
	<instant group="attack" name="Ethereal Spear" words="exori con" lvl="23" mana="25" prem="0" range="7" needtarget="1" exhaustion="2000" groupcooldown="2000" blockwalls="1" needlearn="0" script="attack/ethereal spear.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="attack" name="Divine Missile" words="exori san" lvl="40" mana="20" prem="0" range="4" casterTargetOrDirection="1" needlearn="0" blockwalls="1" exhaustion="2000" groupcooldown="2000" script="attack/divine missile.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant name="Mas San" words="exevo mas san" needlearn="0" maglv="20" mana="350" selftarget="1" script="attack/massan.lua">
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant name="Invisible" words="utana vid" needlearn="0" maglv="15" mana="210" prem="0" selftarget="1" aggressive="0" script="support/invisible.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant name="Mass Healing" words="exura gran mas res" needlearn="0" maglv="15" prem="0" mana="150" selftarget="1" aggressive="0" script="healing/mass_healing.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Hell's Core" words="exevo gran mas vis" needlearn="0" maglv="40" prem="0" mana="800" script="attack/ultimate_explosion.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant group="attack" name="Mas Mort" words="exevo gran mas mort" needlearn="0" maglv="80" prem="0" mana="1800" script="attack/ultimate_mort.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant group="attack" name="Wrath of Nature" words="exevo gran mas pox" needlearn="0" maglv="28" prem="0" mana="800" script="attack/poison_storm.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant group="attack" name="Eternal Winter" words="exevo gran mas frigo" needlearn="0" maglv="80" prem="0" mana="1800" script="attack/frigo_storm.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Energy Wave" words="exevo mort hur" needlearn="0" maglv="18" mana="250" prem="0" direction="1" script="attack/force_wave.lua">
		<vocation name="Sorcerer"/>
		<vocation name="Master Sorcerer"/>
	</instant>
	<instant name="Ice Wave" words="exevo frigo hur" needlearn="0" maglv="18" mana="250" prem="0" direction="1" script="attack/frigo_wave.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
	</instant>
	<instant name="Food (Spell)" words="exevo pan" needlearn="0" maglv="0" mana="30" soul="0" selftarget="1" aggressive="0" script="support/food.lua">
		<vocation name="Druid"/>
		<vocation name="Elder Druid"/>
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>

	<!-- Conjuring (runas via instant) -->
	<instant group="support" name="Animate Dead Rune" words="adana mort" maglv="7" mana="300" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/animate_dead_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Blank Rune" words="adori blank" maglv="2"  mana="50" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/blank_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Chameleon Rune" words="adevo ina" maglv="11" mana="150" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/chameleon_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" spellid="51" name="Conjure Arrow" words="exevo con" maglv="2" mana="40" soul="0" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/conjure_arrow.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" spellid="79" name="Conjure Bolt" words="exevo con mort" maglv="6" mana="70" soul="0" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/conjure_bolt.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" spellid="49" name="Conjure Explosive Arrow" words="exevo con flam" maglv="10" mana="120" soul="0" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/conjure_explosive_arrow.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" spellid="48" name="Conjure Poisoned Arrow" words="exevo con pox" maglv="5" mana="70" soul="0" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/conjure_poisoned_arrow.lua">
		<vocation name="Paladin" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" spellid="95" name="Conjure Power Bolt" words="exevo con vis" maglv="14" mana="200" soul="0" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/conjure_power_bolt.lua">
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" name="Convince Creature Rune" words="adeta sio" maglv="10" mana="100" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/convince_creature_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Cure Poison Rune" words="adana pox" maglv="5" mana="50" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/cure_poison_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Destroy Field Rune" words="adito grav" maglv="6" mana="60" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/destroy_field_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Paladin" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" name="Disintegrate Rune" words="adito tera" maglv="8" mana="100" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/disintegrate_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Paladin" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
		<vocation name="Royal Paladin" />
	</instant>
	<instant group="support" spellid="92" name="Enchant Staff" words="exeta vis" maglv="22" mana="80" premium="0" aggressive="0" selftarget="1" cooldown="2000" needlearn="0" script="conjuring/enchant_staff.lua">
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Energy Bomb Rune" words="adevo mas vis" maglv="18" mana="220" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/energy_bomb_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Energy Field Rune" words="adevo grav vis" maglv="5" mana="80" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/energy_field_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Energy Wall Rune" words="adevo mas grav vis" maglv="18" mana="250" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/energy_wall_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Explosion Rune" words="adevo mas hur" maglv="12" mana="180" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/explosion_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Fire Field Rune" words="adevo grav flam" maglv="3" mana="60" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/fire_field_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Fire Bomb Rune" words="adevo mas flam" maglv="9" mana="120" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/fire_bomb_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Fire Wall Rune" words="adevo mas grav flam" maglv="33" mana="200" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/fire_wall_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Fireball Rune" words="adori flam" maglv="5" mana="60" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/fireball_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Great Fireball Rune" words="adori gran flam" maglv="9" mana="120" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/great_fireball_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Stone Shower Rune" words="adori gran pox" maglv="9" mana="120" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/earthballrune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Thunderstorm Rune" words="adori gran vis" maglv="9" mana="120" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/thunderstorm_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Avalanche Rune" words="adori gran frigo" maglv="9" mana="120" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/great_frigoball_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Heavy Magic Missile Rune" words="adori gran" maglv="3" mana="60" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/heavy_magic_missile_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
		<vocation name="Paladin"/>
		<vocation name="Royal Paladin"/>
	</instant>
	<instant group="support" name="Intense Healing Rune" words="adura gran" maglv="4" mana="60" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/intense_healing_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Light Magic Missile Rune" words="adori" maglv="1" mana="40" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/light_magic_missile_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Magic Wall Rune" words="adevo grav tera" maglv="14" mana="250" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/magic_wall_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Wild Growth Rune" words="exevo grav tera" maglv="14" mana="250" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/wild_wall_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Paralyse Rune" words="adana ani" maglv="35" mana="900" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/paralyze_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Poison Bomb Rune" words="adevo mas pox" maglv="8" mana="130" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/poison_bomb_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Poison Field Rune" words="adevo grav pox" maglv="2" mana="50" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/poison_field_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Poison Wall Rune" words="adevo mas grav pox" maglv="11" mana="160" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/poison_wall_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Soulfire Rune" words="adevo res flam" maglv="13" mana="150" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/soulfire_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Master Sorcerer" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Stalagmite Rune" words="adevo res pox" level="24" mana="350" soul="0" premium="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/stalagmite_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="support" name="Sudden Death Rune" words="adori vita vis" maglv="25" mana="220" soul="0" aggressive="0" cooldown="2000" needlearn="0" script="conjuring/sudden_death_rune.lua">
		<vocation name="Sorcerer" />
		<vocation name="Master Sorcerer" />
	</instant>
	<instant group="support" name="Ultimate Healing Rune" words="adura vita" maglv="11" mana="100" soul="0" aggressive="0" cooldown="1000" needlearn="0" script="conjuring/ultimate_healing_rune.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>
	<instant group="healing" name="Heal Party" words="heal party" lvl="28" mana="140" prem="0" aggressive="0" selftarget="1" exhaustion="1000" groupcooldown="1000" blockwalls="1" script="party/heal.lua">
		<vocation name="Druid" />
		<vocation name="Elder Druid" />
	</instant>

	<!-- Monster Spells (serão ignoradas) -->
	<instant name="djinn electrify" words="###1" aggressive="1" blockwalls="1" needtarget="1" needlearn="1" script="monster/djinn electrify.lua"/>
</spells>
XML;

$doc = @simplexml_load_string($embeddedXml);

$allowedBase = ['Knight','Paladin','Sorcerer','Druid'];
$allowedProm = ['Elite Knight','Royal Paladin','Master Sorcerer','Elder Druid'];
$allowedExtra = ['None'];
$allowedAll = array_merge($allowedBase, $allowedProm, $allowedExtra);

function isMonsterSpell($node) {
    $words = (string)($node['words'] ?? '');
    $script = (string)($node['script'] ?? '');
    if (strpos($words, '###') === 0) return true;
    if ($script && strpos($script, 'monster/') !== false) return true;
    return false;
}

function spellType($node) {
    $name = strtolower((string)$node->getName());
    if ($name === 'instant') {
        $group = (string)($node['group'] ?? '');
        return $group ? ucfirst($group) : 'Instant';
    }
    if ($name === 'rune') return 'Rune';
    return ucfirst($name);
}

function collectVocations($node) {
    $vocs = [];
    foreach ($node->vocation as $v) {
        $vn = trim((string)$v['name']);
        if ($vn !== '') $vocs[] = $vn;
    }
    return $vocs;
}

// 1) Construir mapa de runes (por words)
$runes = [];
$conjures = [];
$instants = [];
$runeMapByWords = [];

if ($doc) {
    foreach ($doc->children() as $child) {
        if (strtolower($child->getName()) !== 'rune') continue;
        if (isMonsterSpell($child)) continue;
        $words = strtolower((string)$child['name']); // no xml o atributo 'name' da rune é o conjunto de palavras
        $runeMapByWords[$words] = [
            'item_id' => (string)($child['id'] ?? ''),
            'maglv' => (string)($child['maglv'] ?? ''),
            'charges' => (string)($child['charges'] ?? '')
        ];
        $vocs = collectVocations($child); $hasV = count($vocs)>0;
        $allowedRuneVocs = ['Sorcerer','Master Sorcerer','Druid','Elder Druid'];
        if ($hasV) $vocs = array_values(array_intersect($vocs, $allowedRuneVocs));
        if (count($vocs)===0) $vocs = $allowedRuneVocs;
        // Derivar nome de exibição a partir do script (ex.: runes/poison_field_rune.lua -> Poison Field Rune)
        $display = (string)$child['name'];
        $scriptPath = (string)($child['script'] ?? '');
        if (preg_match('~runes/([^/]+)\.lua~i', $scriptPath, $m)) {
            $token = str_replace('_', ' ', $m[1]);
            $display = ucwords($token);
        }
         $runes[] = [
            'name' => $display,
            'words' => (string)$child['name'],
            'maglv' => (string)($child['maglv'] ?? ''),
             'level' => '',
            'item_id' => (string)($child['id'] ?? ''),
            'vocations' => implode(', ',$vocs),
            'vocations_raw' => $vocs
        ];
    }

    // 2) Instants (conjure vs instant normal)
    foreach ($doc->children() as $child) {
        if (strtolower($child->getName()) !== 'instant') continue;
        if (isMonsterSpell($child)) continue;
        $scriptAttr = (string)($child['script'] ?? '');
        $isConjure = (strpos($scriptAttr, 'conjuring/') !== false);
        $vocs = collectVocations($child); $hasV = count($vocs)>0;
        if (!$hasV) { $vocs = ['All']; }
         $base = [
            'name' => (string)$child['name'],
            'words' => (string)$child['words'],
            'maglv' => (string)($child['maglv'] ?? ''),
             'level' => (string)($child['lvl'] ?? $child['level'] ?? ''),
            'mana' => (string)($child['mana'] ?? ''),
            'vocations' => implode(', ', $vocs),
            'vocations_raw' => $vocs
        ];
        if ($isConjure) {
            // tentar mapear para a rune pelas words
            $key = strtolower($base['words']);
            $map = $runeMapByWords[$key] ?? null;
            $charges = isset($map['charges']) ? (int)$map['charges'] : 0;
            // No KarmaOT as conjurações rendem em dobro
            if ($charges > 0) {
                $base['amount'] = ($charges * 2) . 'x';
            } else {
                $base['amount'] = '';
            }
            $base['item_id'] = $map['item_id'] ?? '';
            $conjures[] = $base;
        } else {
            $instants[] = $base;
        }
    }
}

// Ordenações
usort($runes, function($a,$b){ return strcasecmp($a['name'],$b['name']); });
usort($conjures, function($a,$b){ $c=strcasecmp($a['name'],$b['name']); if($c!==0)return $c; return ((int)$a['maglv'])<=>((int)$b['maglv']); });
usort($instants, function($a,$b){ $c=strcasecmp($a['name'],$b['name']); if($c!==0)return $c; return ((int)$a['maglv'])<=>((int)$b['maglv']); });

 // Unify for single table view
$allRows = [];
 foreach ($instants as $x) { $x['type']='Instant'; $x['item_id']=''; $x['amount']=''; $allRows[]=$x; }
 foreach ($conjures as $x) { $x['type']='Conjure'; $x['item_id']=($x['item_id']??''); $allRows[]=$x; }
 foreach ($runes as $x) { $x['type']='Rune'; $x['words']=''; $x['mana']=''; $x['amount']=''; $allRows[]=$x; }
 // Sort order aligned with columns: Type, Name, Words, Magic Level, Level, Mana, Amount, Vocations
 usort($allRows, function($a,$b){
   $c = strcasecmp($a['type'] ?? '', $b['type'] ?? ''); if ($c !== 0) return $c;
   $c = strcasecmp($a['name'] ?? '', $b['name'] ?? ''); if ($c !== 0) return $c;
   $c = strcasecmp($a['words'] ?? '', $b['words'] ?? ''); if ($c !== 0) return $c;
   $c = ((int)($a['maglv'] ?? 0)) <=> ((int)($b['maglv'] ?? 0)); if ($c !== 0) return $c;
   $c = ((int)($a['level'] ?? 0)) <=> ((int)($b['level'] ?? 0)); if ($c !== 0) return $c;
   $c = ((int)($a['mana'] ?? 0)) <=> ((int)($b['mana'] ?? 0)); if ($c !== 0) return $c;
   $amountA = (int)preg_replace('~[^0-9]~','', (string)($a['amount'] ?? '0'));
   $amountB = (int)preg_replace('~[^0-9]~','', (string)($b['amount'] ?? '0'));
   $c = $amountA <=> $amountB; if ($c !== 0) return $c;
   return strcasecmp($a['vocations'] ?? '', $b['vocations'] ?? '');
 });

function tibiawiki_candidates($name, $words){
    $cands = [];
    $variants = [];
    // Manual overrides for known assets that must use fixed /images/* paths
    $overrides = [
        'sudden death rune' => 'https://www.tibiawiki.com.br/images/c/c2/Sudden_Death_Rune.gif',
    ];
    $keyLower = strtolower(trim($name));
    if (isset($overrides[$keyLower])) {
        $cands[] = $overrides[$keyLower];
    }
    $make = function($s){
        $s = trim($s);
        if ($s==='') return [];
        $title = ucwords(strtolower($s));
        $under = str_replace(' ', '_', $title);
        return [
            "https://www.tibiawiki.com.br/wiki/Special:FilePath/{$under}.gif",
            "https://www.tibiawiki.com.br/wiki/Special:FilePath/{$under}.png",
        ];
    };
    // Prefer mapped aliases for well-known effects
    $lowerName = strtolower($name);
    if (strpos($lowerName, 'mas mort') !== false) {
        foreach (['Mas Mort', 'Death Damage', 'Death'] as $alias){ foreach ($make($alias) as $u){ $cands[]=$u; }}
    }
    if (strpos($lowerName, 'frigo storm') !== false) {
        foreach (['Frigo Storm', 'Ice Damage', 'Frigo'] as $alias){ foreach ($make($alias) as $u){ $cands[]=$u; }}
    }
    foreach (array_unique(array_filter([$name,$words])) as $v){
        foreach ($make($v) as $u){ $cands[] = $u; }
    }
    // Always include healing fallback icons at the end
    foreach (['Light Healing','Exura'] as $fallback){ foreach ($make($fallback) as $u){ $cands[]=$u; }}
    return array_values(array_unique($cands));
}
?>

<div style="max-width: 980px; margin: 0 auto 10px; padding: 8px 10px; background:#d4c0a1; border:1px solid #c7b48a; font-family: Verdana, Tahoma, Helvetica, sans-serif;">
  <label for="vocFilter" style="font-weight:bold;">Filter by vocation:</label>
  <select id="vocFilter" style="margin-left:8px; padding:4px;">
    <option value="">All</option>
    <option>Knight</option>
    <option>Paladin</option>
    <option>Sorcerer</option>
    <option>Druid</option>
    <option>None</option>
  </select>
  <label style="margin-left:12px;">Search:</label>
  <input id="spellSearch" type="text" placeholder="Type to search..." style="margin-left:6px; padding:4px; min-width:220px;">
  <span id="resultCount" style="float:right; font-weight:bold;">0 results</span>
</div>

<style>
.mass-row { border-left: 4px solid #b08f58; }
/* Type color cues for unified table */
.row-type-instant td:first-child { border-left: 4px solid #3b82f6; }
.row-type-conjure td:first-child { border-left: 4px solid #10b981; }
.row-type-rune td:first-child { border-left: 4px solid #ef4444; }
.badge { background:#777; color:#fff; padding:2px 6px; border-radius:4px; font-size:11px; font-weight:bold; }
.badge-instant { background:#3b82f6; }
.badge-conjure { background:#10b981; }
.badge-rune { background:#ef4444; }

/* Bosses-like tooltip for spell names */
.name-wrapper { position: relative; display: inline-block; }
.name-wrapper .info-modal { position:absolute; bottom:110%; left:50%; transform:translateX(-50%); background:rgba(30,60,200,.6); color:#fff; padding:8px 12px; border-radius:6px; font-size:10px; white-space:normal; max-width:320px; line-height:1.25; text-align:left; opacity:0; pointer-events:none; transition:opacity .3s ease; z-index:10; }
.name-wrapper:hover .info-modal { opacity:1; }
</style>

<div id="unifiedWrap" style="width:95%; margin: 0 auto; max-height: 360px; overflow: hidden; box-shadow: #000000 1px 1px 10px;">
  <table id="unifiedTable" style="width:100%; font-family: Verdana, Tahoma, Helvetica, sans-serif; font-size:13px; border-spacing:1px;" cellspacing="1" cellpadding="5">
  <thead>
      <tr bgcolor="#4a4a45">
        <th style="color:#fff; text-align:center; width:34px;">Icon</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="1" class="sortable">Type</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="2" class="sortable">Name</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="3" class="sortable">Words</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="4" class="sortable">Magic Level</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="5" class="sortable">Level</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="6" class="sortable">Mana</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="7" class="sortable">Amount</th>
        <th style="color:#fff; text-align:center; cursor:pointer;" data-col="8" class="sortable">Vocations</th>
    </tr>
  </thead>
  <tbody>
      <?php $alt=false; foreach($allRows as $r): $bg=$alt?'#f1e0c6':'#d4c0a1'; $alt=!$alt; $dataV=implode('|',$r['vocations_raw']); ?>
      <tr bgcolor="<?= $bg ?>" data-vocs="<?= htmlspecialchars($dataV,ENT_QUOTES) ?>" data-type="<?= htmlspecialchars($r['type'],ENT_QUOTES) ?>" class="row-type-<?= strtolower($r['type']) ?>">
        <td style="text-align:center;">
          <?php
            // Sempre usar hotlink do TibiaWiki para TODAS as entradas (inclusive runas)
            $cands = tibiawiki_candidates($r['name'] ?? '', $r['words'] ?? '');
            if (!empty($cands)) {
                $first = htmlspecialchars($cands[0]);
                $onerr = "this.style.display='none';";
                if (count($cands) > 1) {
                    $second = htmlspecialchars($cands[1]);
                    $onerr = "if(!this.dataset.alt){this.dataset.alt='1'; this.src='{$second}';}else{this.style.display='none';}";
                }
                echo '<img src="'. $first .'" alt="icon" title="'. htmlspecialchars($r['name']) .'" style="width:24px; height:24px; object-fit:contain;" onerror="'. $onerr .'">';
            }
          ?>
        </td>
        <td style="text-align:center; font-weight:bold;">
          <?php $t=strtolower($r['type']); $cls = $t==='instant'?'badge-instant':($t==='conjure'?'badge-conjure':'badge-rune'); ?>
          <span class="badge <?= $cls ?>"><?= htmlspecialchars($r['type']) ?></span>
        </td>
        <?php
          $tipLines = [];
          if (!empty($r['type'])) $tipLines[] = 'Type: ' . $r['type'];
          if (!empty($r['words'])) $tipLines[] = 'Words: ' . $r['words'];
          if ($r['maglv'] !== '') $tipLines[] = 'Magic: ' . $r['maglv'];
          if ($r['mana'] !== '') $tipLines[] = 'Mana: ' . $r['mana'];
          if (!empty($r['amount'])) $tipLines[] = 'Amount: ' . $r['amount'];
          $tipLines[] = 'Vocations: ' . $r['vocations'];
          $tip = implode("\n", $tipLines);
        ?>
        <td style="text-align:center;">
          <span class="name-wrapper">
            <?= htmlspecialchars($r['name']) ?>
            <div class="info-modal"><?= nl2br(htmlspecialchars($tip)) ?></div>
          </span>
        </td>
        <td style="text-align:center;"><?= htmlspecialchars($r['words'] ?? '') ?></td>
        <td style="text-align:center;">&nbsp;<?= htmlspecialchars($r['maglv'] ?? '') ?></td>
        <td style="text-align:center;">&nbsp;<?= htmlspecialchars($r['level'] ?? '') ?></td>
        <td style="text-align:center;">&nbsp;<?= htmlspecialchars($r['mana'] ?? '') ?></td>
        <td style="text-align:center;"><?= htmlspecialchars($r['amount'] ?? '') ?></td>
        <td style="text-align:center;"><?= htmlspecialchars($r['vocations']) ?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>
<div style="text-align:center; margin:8px 0 16px;">
  <button id="unifiedToggle" style="padding:6px 10px; background:#4a4a45; color:#fff; border:1px solid #333; cursor:pointer;">Show more</button>
</div>

<script>
(function(){
  function updateCount(){
    var total = 0;
    ['instantTable','conjureTable','runeTable'].forEach(function(id){
      var rows = document.querySelectorAll('#'+id+' tbody tr');
      rows.forEach(function(tr){ if (tr.style.display !== 'none') total++; });
    });
    var rc = document.getElementById('resultCount'); if (rc) rc.textContent = total + ' results';
  }

  function applyFilters(){
    var q = (document.getElementById('spellSearch').value || '').toLowerCase();
    var voc = document.getElementById('vocFilter').value;
    var rows = document.querySelectorAll('#unifiedTable tbody tr');
    rows.forEach(function(tr){
      var text = tr.textContent.toLowerCase();
      var vocs = tr.getAttribute('data-vocs') || '';
      var okText = !q || text.indexOf(q) !== -1;
      var okVoc = !voc || vocs.indexOf(voc) !== -1 || vocs.indexOf('All') !== -1;
      tr.style.display = (okText && okVoc) ? '' : 'none';
    });
    updateCount();
  }

  document.getElementById('vocFilter').addEventListener('change', applyFilters);
  document.getElementById('spellSearch').addEventListener('input', applyFilters);
  // Sortable headers
  (function(){
    var dir = {};
    function getText(tr, idx){
      var td = tr.children[idx]; if (!td) return '';
      return (td.textContent || '').trim();
    }
    function getNum(val){ var m = (val||'').match(/[0-9]+/); return m ? parseInt(m[0], 10) : 0; }
    document.querySelectorAll('#unifiedTable thead .sortable').forEach(function(th){
      var idx = parseInt(th.getAttribute('data-col') || '0', 10);
      dir[idx] = dir[idx] || 1; // 1 asc, -1 desc
      th.addEventListener('click', function(){
        var rows = Array.from(document.querySelectorAll('#unifiedTable tbody tr'));
        var numericCols = {4:true,5:true,6:true,7:true}; // Magic, Level, Mana, Amount
        rows.sort(function(a,b){
          var av = getText(a, idx), bv = getText(b, idx);
          var res;
          if (numericCols[idx]) {
            var an = getNum(av), bn = getNum(bv);
            res = an - bn;
          } else {
            res = av.localeCompare(bv, undefined, { sensitivity:'base' });
          }
          return dir[idx] * res;
        });
        var tb = document.querySelector('#unifiedTable tbody');
        rows.forEach(function(r){ tb.appendChild(r); });
        dir[idx] *= -1; // toggle direction
      });
    });
  })();
  // Collapse/expand unified table
  (function(){
    var wrap = document.getElementById('unifiedWrap');
    var btn = document.getElementById('unifiedToggle');
    var expanded = false;
    btn.addEventListener('click', function(){
      expanded = !expanded;
      if (expanded){ wrap.style.maxHeight=''; wrap.style.overflow=''; btn.textContent='Show less'; }
      else { wrap.style.maxHeight='360px'; wrap.style.overflow='hidden'; btn.textContent='Show more'; }
    });
  })();

  applyFilters();
})();
</script>

