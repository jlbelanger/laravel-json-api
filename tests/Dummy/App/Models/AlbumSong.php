<?php

namespace Jlbelanger\LaravelJsonApi\Tests\Dummy\App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jlbelanger\LaravelJsonApi\Tests\Dummy\App\Models\Album;
use Jlbelanger\LaravelJsonApi\Tests\Dummy\App\Models\Song;
use Jlbelanger\LaravelJsonApi\Tests\Dummy\Database\Factories\AlbumSongFactory;
use Jlbelanger\LaravelJsonApi\Traits\Resource;

class AlbumSong extends Model
{
	use HasFactory, Resource;

	protected $table = 'album_song';

	protected $fillable = [
		'album_id',
		'song_id',
		'track',
		'length',
	];

	/**
	 * Creates a new factory instance for the model.
	 *
	 * @return Factory
	 */
	protected static function newFactory() : Factory
	{
		return AlbumSongFactory::new();
	}

	/**
	 * @return array
	 */
	protected function rules() : array
	{
		return [
			'attributes.track' => 'required',
			'relationships.album' => 'required',
			'relationships.song' => 'required',
		];
	}

	/**
	 * @return array
	 */
	public function singularRelationships() : array
	{
		return ['album', 'song'];
	}

	/**
	 * @return BelongsTo
	 */
	public function album() : BelongsTo
	{
		return $this->belongsTo(Album::class);
	}

	/**
	 * @return BelongsTo
	 */
	public function song() : BelongsTo
	{
		return $this->belongsTo(Song::class);
	}
}
