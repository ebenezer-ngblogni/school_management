import chess
import chess.pgn
import chess.svg
from moviepy.editor import ImageSequenceClip
from PIL import Image, ImageFilter
from io import BytesIO
import cairosvg
import numpy as np  # Importer numpy

def create_chess_video_from_pgn(pgn_file, output_video, frame_duration=1, image_size=600, video_fps=10, bitrate="5000k"):
    with open(pgn_file) as f:
        game = chess.pgn.read_game(f)
    
    if not game:
        raise ValueError("No valid game found in the PGN file.")
    
    board = game.board()
    moves = list(game.mainline_moves())
    frames = []

    for i, move in enumerate(moves):
        board.push(move)
        
        # Générer SVG de la position actuelle de l'échiquier avec une taille personnalisée
        svg_board = chess.svg.board(board, size=image_size)
        
        try:
            # Convertir SVG en PNG avec une meilleure résolution
            png_image = cairosvg.svg2png(bytestring=svg_board, output_width=image_size*2, output_height=image_size*2)
            
            # Convertir les bytes PNG en image PIL
            image = Image.open(BytesIO(png_image))
            
            # Appliquer un filtre de lissage (optionnel, selon vos préférences)
            image = image.filter(ImageFilter.SMOOTH_MORE)
            
            # Redimensionner l'image à une résolution 1080p (optionnel)
            # image = image.resize((1920, 1080), Image.Resampling.LANCZOS)  # Utiliser LANCZOS pour un redimensionnement de haute qualité
            
            # Convertir l'image PIL en tableau NumPy
            frames.append(np.array(image))

            print(f"Frame {i+1} générée avec succès.")
        except Exception as e:
            print(f"Erreur lors de la conversion du coup {i+1} en image : {e}")
            continue  # Ignorer cette frame et passer au coup suivant

    if not frames:
        raise ValueError("Aucune frame générée. Veuillez vérifier le fichier PGN ou la conversion SVG.")

    # Créer la vidéo à partir des frames
    clip = ImageSequenceClip(frames, fps=video_fps)  # Utiliser un fps plus élevé pour plus de fluidité
    clip.write_videofile(output_video, codec="libx264", bitrate=bitrate)

# Usage
create_chess_video_from_pgn("game.pgn", "immortal_game_high_quality.mp4", frame_duration=2, image_size=600, video_fps=1, bitrate="5000k")
