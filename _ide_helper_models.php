<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre_item
 * @property string $descripcion
 * @property string $tipo_contenido
 * @property string $fecha_publicacion
 * @property string $autor
 * @property int $estado
 * @property int $user_id
 * @property int $entidad_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereEntidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereNombreItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereTipoContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Articulo whereUserId($value)
 */
	class Articulo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Entidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Entidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Entidad query()
 */
	class Entidad extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $status
 * @property string $password
 * @property-read \App\Models\Entidad|null $entidad
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 */
	class User extends \Eloquent {}
}

